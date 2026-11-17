<?php

namespace Tests\Feature;

use App\Support\ServicePageCatalog;
use Tests\TestCase;

class TebraSchedulingIntegrationTest extends TestCase
{
    private const PORTAL_URL = 'https://portal.kareo.com/pp-webapp/app/new/login';

    private const SCHEDULER_URL = 'https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057';

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_iframe_mode_is_enabled_by_default(): void
    {
        $response = $this->get(route('appointments'));

        $response
            ->assertOk()
            ->assertViewHas('iframeEnabled', true)
            ->assertHeader('Content-Security-Policy', 'frame-src https://d2oe0ra32qx05a.cloudfront.net;')
            ->assertSee('Online Scheduler')
            ->assertDontSee('Load Secure Scheduler')
            ->assertDontSee('Before You Continue')
            ->assertDontSee('Laravel website');
    }

    public function test_external_mode_remains_available_for_the_appointment_page(): void
    {
        config()->set('tebra.scheduler_mode', 'external');

        $response = $this->get(route('appointments'));

        $response
            ->assertOk()
            ->assertViewIs('appointments')
            ->assertViewHas('iframeEnabled', false)
            ->assertHeader('Referrer-Policy', 'no-referrer')
            ->assertHeaderMissing('Content-Security-Policy')
            ->assertSee('Embedded scheduling is not enabled.')
            ->assertSee('href="'.self::SCHEDULER_URL.'"', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee('href="tel:+16593466314"', false)
            ->assertDontSee('<iframe', false)
            ->assertDontSee('Load Secure Scheduler');
    }

    public function test_iframe_mode_loads_automatically_and_has_scoped_security_controls(): void
    {
        config()->set('tebra.scheduler_mode', 'iframe');
        config()->set('tebra.scheduler_timeout_ms', 7000);

        $response = $this->get(route('appointments'));

        $response
            ->assertOk()
            ->assertViewHas('iframeEnabled', true)
            ->assertHeader('Referrer-Policy', 'no-referrer')
            ->assertHeader('Content-Security-Policy', 'frame-src https://d2oe0ra32qx05a.cloudfront.net;')
            ->assertSee('Online Scheduler')
            ->assertDontSee('Load Secure Scheduler')
            ->assertDontSee('x-on:click="loadScheduler"', false)
            ->assertDontSee('<template x-if="schedulerLoaded">', false)
            ->assertSee(':src="schedulerUrl"', false)
            ->assertSee('title="Schedule an appointment with Falola Psychiatry Practice"', false)
            ->assertSee('referrerpolicy="no-referrer"', false)
            ->assertSee('aria-live="polite"', false)
            ->assertSee('taking longer than expected')
            ->assertSee('href="'.self::SCHEDULER_URL.'"', false)
            ->assertDontSee('src="'.self::SCHEDULER_URL.'"', false);
    }

    public function test_missing_scheduler_configuration_fails_closed_to_phone_support(): void
    {
        config()->set('tebra.scheduler_url', null);
        config()->set('tebra.scheduler_mode', 'iframe');

        $response = $this->get(route('appointments'));

        $response
            ->assertOk()
            ->assertViewHas('iframeEnabled', false)
            ->assertHeaderMissing('Content-Security-Policy')
            ->assertSee('Online Scheduling Is Temporarily Unavailable')
            ->assertSee('href="tel:+16593466314"', false)
            ->assertDontSee('<iframe', false)
            ->assertDontSee(self::SCHEDULER_URL, false);
    }

    public function test_all_appointment_ctas_use_the_centralized_internal_route(): void
    {
        $pages = [
            '/' => 3,
            '/about' => 4,
            '/services' => 4,
            '/telepsychiatry' => 4,
            '/patient-information' => 3,
            '/office-fees-policies' => 3,
            '/contact' => 4,
        ];

        foreach (ServicePageCatalog::slugs() as $service) {
            $pages[route('services.show', ['service' => $service], false)] = 4;
        }

        foreach ($pages as $uri => $expectedCount) {
            $response = $this->get($uri);

            $response->assertOk();
            $this->assertSame(
                $expectedCount,
                substr_count($response->getContent(), 'href="'.route('appointments').'"'),
                "Unexpected appointment CTA count for {$uri}.",
            );
            $response->assertDontSee(self::SCHEDULER_URL, false);
        }
    }

    public function test_patient_portal_remains_an_external_handoff(): void
    {
        $patientInformation = $this->get(route('patient-information'));
        $portal = $this->get(route('patient-portal'));

        $patientInformation
            ->assertOk()
            ->assertSee('href="'.self::PORTAL_URL.'"', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener noreferrer"', false);

        $this->assertSame(4, substr_count($patientInformation->getContent(), 'href="'.self::PORTAL_URL.'"'));

        $portal
            ->assertOk()
            ->assertViewIs('patient-portal')
            ->assertSee('href="'.self::PORTAL_URL.'"', false)
            ->assertSee('target="_blank"', false)
            ->assertDontSee('<iframe', false)
            ->assertDontSee('<form', false);
    }

    public function test_invalid_portal_configuration_fails_closed_to_phone_support(): void
    {
        config()->set('tebra.portal_url', 'https://portal.kareo.com.attacker.example/login');

        $patientInformation = $this->get(route('patient-information'));
        $portal = $this->get(route('patient-portal'));

        $patientInformation
            ->assertOk()
            ->assertSee('Call for Portal Help')
            ->assertDontSee('portal.kareo.com.attacker.example', false);

        $portal
            ->assertOk()
            ->assertSee('Portal Link Temporarily Unavailable')
            ->assertSee('href="tel:+16593466314"', false)
            ->assertDontSee('portal.kareo.com.attacker.example', false)
            ->assertDontSee('<form', false);
    }
}

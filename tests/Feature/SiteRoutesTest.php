<?php

namespace Tests\Feature;

use App\Support\ServicePageCatalog;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SiteRoutesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_home_page_renders_the_approved_homepage_content(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('home')
            ->assertSee('Personalized, Evidence-Based Psychiatric Care')
            ->assertSee('Compassionate psychiatric evaluations and medication management for adults, with convenient telepsychiatry throughout Alabama and in-person appointments in Trussville.')
            ->assertSee('Dr. Michael Falola, M.D., M.P.H.')
            ->assertSee('Accepted Insurance')
            ->assertSee('3516 Vann Road Suite 114-A')
            ->assertSee('Trussville, AL 35235')
            ->assertSee('Google Map showing Falola Psychiatry Practice')
            ->assertSee('href="'.route('appointments').'"', false)
            ->assertDontSee('Evidence-Based Mental Health Care for Adults')
            ->assertDontSee('board-certified', false);

        $content = $response->getContent();

        $this->assertLessThan(
            strpos($content, 'Personalized, Evidence-Based Psychiatric Care'),
            strpos($content, 'Accepted Insurance'),
        );
        $this->assertSame(3, substr_count($content, 'data-hero-slide'));
        $this->assertStringContainsString('heroCarousel({ count: 3, intervalMs: 5500 })', $content);
        $this->assertStringContainsString('images/home/hero-mountains.webp', $content);
        $this->assertStringContainsString('images/home/service-anxiety.jpg', $content);
        $this->assertStringContainsString('images/home/service-trauma.jpg', $content);
    }

    public function test_home_page_links_every_service_card_to_its_detail_route(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        foreach (ServicePageCatalog::slugs() as $service) {
            $response->assertSee('href="'.route('services.show', ['service' => $service]).'"', false);
        }
    }

    public function test_about_page_renders_verified_physician_content(): void
    {
        $response = $this->get('/about');

        $response
            ->assertOk()
            ->assertViewIs('about')
            ->assertSee('Dr. Michael Falola, M.D., M.P.H.')
            ->assertSee('University of Alabama at Birmingham')
            ->assertSee('Current and Past Appointments')
            ->assertSee('https://www.researchgate.net/profile/Michael-Falola', false)
            ->assertSee('https://www.psychiatryonline.org/doi/10.1176/appi.pn.2018.6a26', false)
            ->assertSee('href="'.route('appointments').'"', false)
            ->assertDontSee('board-certified', false);
    }

    public function test_services_page_renders_every_verified_service_and_destination(): void
    {
        $response = $this->get('/services');

        $response
            ->assertOk()
            ->assertViewIs('services')
            ->assertSee('Areas of Care and Treatment')
            ->assertSee('Interactive video and audio care')
            ->assertSee('Support for patterns of inattention, hyperactivity, and impulsivity')
            ->assertSee('Support focused on study strategies, time management, organization, and academic goals.')
            ->assertSee('href="'.route('appointments').'"', false)
            ->assertDontSee("is listed among the practice's areas of care");

        foreach (self::servicePages() as [$slug, $name]) {
            $response
                ->assertSee($name)
                ->assertSee('href="'.route('services.show', ['service' => $slug]).'"', false);
        }
    }

    public function test_telepsychiatry_page_renders_verified_information_and_shared_actions(): void
    {
        $response = $this->get('/telepsychiatry');

        $response
            ->assertOk()
            ->assertViewIs('telepsychiatry')
            ->assertSee('Convenient Virtual Care')
            ->assertSee('Important: Location Requirement')
            ->assertSee('Telepsychiatry services are available only to patients who are physically located in Alabama at the time of their appointment.')
            ->assertSee('href="#how-it-works"', false)
            ->assertSee('href="'.route('contact').'"', false)
            ->assertSee('href="'.route('appointments').'"', false)
            ->assertDontSee('HIPAA-compliant')
            ->assertDontSee('secure link');
    }

    public function test_telepsychiatry_page_photographs_are_unique_files(): void
    {
        $imagePaths = [
            public_path('images/telepsychiatry/hero.webp'),
            public_path('images/telepsychiatry/how-it-works.webp'),
            public_path('images/telepsychiatry/compassionate-care.webp'),
        ];

        $imageHashes = [];

        foreach ($imagePaths as $imagePath) {
            $this->assertFileExists($imagePath);
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(3, array_unique($imagePaths));
        $this->assertCount(3, array_unique($imageHashes));
    }

    public function test_patient_information_page_renders_verified_resources_and_destinations(): void
    {
        $response = $this->get('/patient-information');

        $response
            ->assertOk()
            ->assertViewIs('patient-information')
            ->assertSee('Helpful Information for Your Care')
            ->assertSee('Preparing for Your Visit')
            ->assertSee('Confirm Current Details')
            ->assertSee('Quick Answers from Verified Information')
            ->assertSee('Access the External Patient Portal')
            ->assertSee('href="#appointments"', false)
            ->assertSee('href="http://localhost:8000/office-fees-policies#insurance-payment"', false)
            ->assertSee('href="http://localhost:8000/office-fees-policies#consultation-fees"', false)
            ->assertSee('href="#frequently-asked-questions"', false)
            ->assertSee('href="'.route('appointments').'"', false)
            ->assertSee('https://portal.kareo.com/pp-webapp/app/new/login', false)
            ->assertSee('target="_blank"', false)
            ->assertDontSee('$300')
            ->assertDontSee('$350')
            ->assertDontSee('manage your care');
    }

    public function test_patient_information_page_photographs_are_unique_files(): void
    {
        $imagePaths = [
            public_path('images/patient-information/hero.webp'),
            public_path('images/patient-information/appointments.webp'),
            public_path('images/patient-information/insurance-payment.webp'),
            public_path('images/patient-information/patient-portal.webp'),
        ];

        $imageHashes = [];

        foreach ($imagePaths as $imagePath) {
            $this->assertFileExists($imagePath);
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(4, array_unique($imagePaths));
        $this->assertCount(4, array_unique($imageHashes));
    }

    public function test_contact_page_renders_verified_destinations_without_activating_a_form(): void
    {
        $response = $this->get('/contact');

        $response
            ->assertOk()
            ->assertViewIs('contact')
            ->assertSee('Get in Touch')
            ->assertSee('href="tel:+16593466314"', false)
            ->assertSee('href="mailto:contact@falolapsychiatry.com"', false)
            ->assertSee('3516 Vann Road Suite 114-A, Trussville, AL 35235')
            ->assertSee('https://www.google.com/maps/dir/?api=1&amp;destination=3516+Vann+Road+Suite+114-A%2C+Trussville%2C+AL+35235', false)
            ->assertSee('https://www.google.com/maps?q=3516+Vann+Road+Suite+114-A%2C+Trussville%2C+AL+35235&amp;output=embed', false)
            ->assertSee('Please contact our office to confirm current office hours and appointment availability.')
            ->assertSee('href="'.route('appointments').'"', false)
            ->assertSee('This website and ordinary email are not patient portal or emergency channels.')
            ->assertDontSee('<form', false)
            ->assertDontSee('8:30 AM')
            ->assertDontSee('HIPAA-compliant');
    }

    public function test_contact_page_photographs_are_unique_files(): void
    {
        $imagePaths = [
            public_path('images/contact/hero.webp'),
            public_path('images/contact/appointment-cta.webp'),
        ];

        $imageHashes = [];

        foreach ($imagePaths as $imagePath) {
            $this->assertFileExists($imagePath);
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(2, array_unique($imagePaths));
        $this->assertCount(2, array_unique($imageHashes));
    }

    public function test_office_fees_policies_page_renders_policy_topics_without_review_warnings(): void
    {
        $response = $this->get('/office-fees-policies');

        $response
            ->assertOk()
            ->assertViewIs('office-fees-policies')
            ->assertSee('Office Fees &amp; Practice Policies', false)
            ->assertSee('Office Fees')
            ->assertSee('With Insurance: Only your co-pay required at the time of visit.')
            ->assertSee('Fee verification required')
            ->assertSee('The preserved self-pay amounts conflict with historical payment-link amounts and require practice confirmation before scheduling or paying.')
            ->assertSee('Practice Policies')
            ->assertSee('72-hour notice')
            ->assertSee('48–72 hours')
            ->assertSee('Schedule II–V controlled substance')
            ->assertSee('CMS.org')
            ->assertSee('Children (under the age of 17)')
            ->assertSee('href="'.route('appointments').'"', false)
            ->assertDontSee('buy.stripe.com', false)
            ->assertDontSee('Policy review notice')
            ->assertDontSee('Review required:')
            ->assertDontSee('Legacy website wording')
            ->assertDontSee('Historical pricing discrepancy')
            ->assertDontSee('Contact office')
            ->assertDontSee('Contact the office for current consultation fees and payment options.');

        foreach (self::practicePolicyHeadings() as $heading) {
            $response->assertSee($heading);
        }

        $this->assertSame(9, substr_count($response->getContent(), 'aria-controls="policy-panel-'));
        $this->assertSame(9, substr_count($response->getContent(), ':aria-expanded="open.toString()"'));
    }

    public function test_shared_header_preserves_navigation_contact_and_patient_actions(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        preg_match('/<header.*?<\/header>/s', $response->getContent(), $matches);

        $header = $matches[0] ?? '';

        $this->assertNotSame('', $header);
        $this->assertSame(2, substr_count($header, 'href="'.route('contact').'"'));
        $this->assertSame(1, substr_count($header, 'href="tel:+16593466314"'));
        $this->assertSame(2, substr_count($header, 'href="'.route('office-fees-policies').'"'));
        $this->assertSame(2, substr_count($header, 'href="https://portal.kareo.com/pp-webapp/app/new/login"'));
        $this->assertSame(2, substr_count($header, 'target="_blank"'));
        $this->assertSame(2, substr_count($header, 'rel="noopener noreferrer"'));
        $this->assertSame(2, substr_count($header, 'href="'.route('appointments').'"'));
        $this->assertSame(0, substr_count($header, 'href="'.route('patient-information').'"'));
        $this->assertStringContainsString('sticky top-0', $header);
        $this->assertStringContainsString('items-center gap-5 min-[1380px]:flex', $header);
        $this->assertStringContainsString('data-desktop-action-row', $header);
        $this->assertLessThan(strpos($header, 'data-desktop-action-row'), strpos($header, '</nav>'));
        $this->assertStringContainsString('Office Fees &amp; Policies', $header);
        $this->assertSame(1, substr_count($header, 'src="'.asset('images/home/logo-mark-transparent.png').'"'));
        $this->assertStringContainsString('absolute left-1/2', $header);
        $this->assertStringNotContainsString('brand-lockup-mark', $header);
        $this->assertFileExists(public_path('images/home/logo-mark-transparent.png'));
    }

    public function test_sitewide_eyebrow_labels_are_removed(): void
    {
        $paths = [
            '/',
            '/about',
            '/appointments',
            '/contact',
            '/office-fees-policies',
            '/patient-information',
            '/patient-portal',
            '/services',
            '/services/adhd',
            '/telepsychiatry',
        ];

        foreach ($paths as $path) {
            $response = $this->get($path);

            $response->assertOk();

            $content = $response->getContent();

            $this->assertStringNotContainsString('class="eyebrow', $content);
            $this->assertStringNotContainsString('text-xs font-semibold uppercase tracking-[0.2em] text-brand-lime', $content);
            $this->assertStringNotContainsString('text-xs font-semibold uppercase tracking-[0.2em] text-white/75', $content);
        }
    }

    public function test_office_fees_policies_page_is_linked_from_shared_navigation_and_patient_information(): void
    {
        $destination = route('office-fees-policies');

        $homeResponse = $this->get('/');
        $patientInformationResponse = $this->get('/patient-information');

        $homeResponse
            ->assertOk()
            ->assertSee('href="'.$destination.'"', false);

        $patientInformationResponse
            ->assertOk()
            ->assertSee('href="'.$destination.'#insurance-payment"', false)
            ->assertSee('href="'.$destination.'#consultation-fees"', false);
    }

    public function test_office_fees_policies_page_photographs_are_unique_files(): void
    {
        $imagePaths = [
            public_path('images/office-fees-policies/hero.webp'),
            public_path('images/office-fees-policies/policies.webp'),
        ];

        $imageHashes = [];

        foreach ($imagePaths as $imagePath) {
            $this->assertFileExists($imagePath);
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(2, array_unique($imagePaths));
        $this->assertCount(2, array_unique($imageHashes));
    }

    #[DataProvider('servicePages')]
    public function test_each_service_detail_page_renders_its_content_and_shared_actions(string $slug, string $name): void
    {
        $servicePage = ServicePageCatalog::find($slug);
        $this->assertNotNull($servicePage);

        $response = $this->get(route('services.show', ['service' => $slug]));

        $response
            ->assertOk()
            ->assertViewIs('services.show')
            ->assertViewHas('service', fn (array $service): bool => $service['name'] === $name)
            ->assertSee('<h1', false)
            ->assertSee($name)
            ->assertSee($servicePage['overview_heading'])
            ->assertSee('Common Concerns')
            ->assertSee('Important Note')
            ->assertSee('general educational information')
            ->assertSee('href="'.route('services.index').'"', false)
            ->assertSee('href="'.route('contact').'"', false)
            ->assertSee('href="'.route('services.show', ['service' => $slug]).'"', false)
            ->assertSee('images/services/details/'.$slug.'.webp', false)
            ->assertSee('href="'.route('appointments').'"', false);
    }

    public function test_unknown_service_detail_returns_not_found(): void
    {
        $this->get('/services/not-a-service')->assertNotFound();
    }

    public function test_service_detail_photographs_are_unique_files(): void
    {
        $imagePaths = [];
        $imageHashes = [];

        foreach (ServicePageCatalog::slugs() as $slug) {
            $service = ServicePageCatalog::find($slug);
            $this->assertNotNull($service);

            $imagePath = public_path('images/services/details/'.$service['hero_image']);
            $this->assertFileExists($imagePath);

            $imagePaths[] = $imagePath;
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(10, array_unique($imagePaths));
        $this->assertCount(10, array_unique($imageHashes));
    }

    /** @return list<string> */
    public static function practicePolicyHeadings(): array
    {
        return [
            'Check-In & Appointments',
            'Cancellations & No-Shows',
            'Telehealth (Telepsychiatry)',
            'Medication Refills & Controlled Substances',
            'Laboratory Testing',
            'Treatment Communications',
            'Medical Records & Documentation',
            'Patient Dismissal',
            'Privacy & HIPAA',
        ];
    }

    /** @return array<string, array{string, string}> */
    public static function servicePages(): array
    {
        return [
            'ADHD' => ['adhd', 'ADHD'],
            'anxiety' => ['anxiety', 'Anxiety'],
            'depression' => ['depression', 'Depression'],
            'bipolar disorders' => ['bipolar-disorders', 'Bipolar Disorders'],
            'trauma' => ['trauma', 'Trauma'],
            'OCD' => ['ocd', 'OCD'],
            'addiction' => ['addiction', 'Addiction'],
            'schizophrenia' => ['schizophrenia', 'Schizophrenia'],
            'brief psychotherapies' => ['brief-psychotherapies', 'Brief Psychotherapies'],
            'academic coaching' => ['academic-coaching', 'Academic Coaching'],
        ];
    }
}

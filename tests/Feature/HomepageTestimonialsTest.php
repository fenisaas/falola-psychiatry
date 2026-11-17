<?php

namespace Tests\Feature;

use App\Support\TestimonialCatalog;
use Tests\TestCase;

class HomepageTestimonialsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_catalog_contains_exactly_the_eleven_approved_unique_testimonials(): void
    {
        $testimonials = TestimonialCatalog::all();

        $this->assertSame(self::approvedTestimonials(), $testimonials);
        $this->assertCount(11, $testimonials);
        $this->assertCount(11, array_unique(array_column($testimonials, 'quote')));
    }

    public function test_home_page_renders_every_testimonial_with_its_attribution(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('home')
            ->assertViewHas('testimonials', TestimonialCatalog::all());

        foreach (self::approvedTestimonials() as $testimonial) {
            $response
                ->assertSee($testimonial['quote'])
                ->assertSee($testimonial['name'])
                ->assertSee($testimonial['date']);
        }

        $this->assertSame(11, substr_count($response->getContent(), 'data-testimonial-slide'));
        $this->assertSame(11, substr_count($response->getContent(), 'data-testimonial-indicator'));
    }

    public function test_home_page_renders_accessible_manual_carousel_controls(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Testimonials')
            ->assertDontSee('What Patients Have Shared')
            ->assertDontSee('Reflections from patients about their experiences with Falola Psychiatry Practice.')
            ->assertSee('window.setInterval', false)
            ->assertSee('}, 5500);', false)
            ->assertSee("window.matchMedia('(prefers-reduced-motion: reduce)').matches", false)
            ->assertSee('@mouseenter="pauseForInteraction()"', false)
            ->assertSee('@mouseleave="resumeAfterInteraction()"', false)
            ->assertSee('@focusin="pauseForInteraction()"', false)
            ->assertSee('@keydown.left.prevent.stop="previous()"', false)
            ->assertSee('@keydown.right.prevent.stop="next()"', false)
            ->assertSee('@click="toggleAutoplay()"', false)
            ->assertSee(':aria-live="autoplayPaused || interactionPaused ? \'polite\' : \'off\'"', false)
            ->assertSee('aria-label="Show previous testimonial"', false)
            ->assertSee('aria-label="Show next testimonial"', false)
            ->assertSee('data-testimonial-autoplay', false)
            ->assertSee('motion-safe:duration-500', false)
            ->assertDontSee('Auto-rotating testimonials')
            ->assertDontSee('Paused while interacting')
            ->assertDontSee('Automatic rotation paused');
    }

    public function test_testimonial_content_is_html_escaped(): void
    {
        $testimonials = [[
            'name' => '<script>alert("name")</script>',
            'date' => '<script>alert("date")</script>',
            'quote' => '<script>alert("quote")</script>',
        ]];

        $view = (string) $this->view('home', compact('testimonials'));

        $this->assertStringContainsString('&lt;script&gt;', $view);
        $this->assertStringNotContainsString('<script>alert("name")</script>', $view);
        $this->assertStringNotContainsString('<script>alert("date")</script>', $view);
        $this->assertStringNotContainsString('<script>alert("quote")</script>', $view);
    }

    /** @return list<array{name: string, date: string, quote: string}> */
    private static function approvedTestimonials(): array
    {
        return [
            [
                'name' => 'Geoffrey',
                'date' => 'Jan 2025',
                'quote' => 'He cares about what is being said, and he listens. It isn\'t about meds it is about helping.',
            ],
            [
                'name' => 'Lindsay',
                'date' => 'November 2024',
                'quote' => 'Dr. Falola was very kind and patient. He allowed me to express myself and take my time to answer questions. He was very thorough and I liked that he helped me understand things as we were going along through the process. I appreciated his experience, kindness and insight.',
            ],
            [
                'name' => 'Erin',
                'date' => 'February 2025',
                'quote' => 'Very nice and knowledgeable!',
            ],
            [
                'name' => 'Sonya',
                'date' => 'October 2024',
                'quote' => 'Dr. Falola is very prompt. He gets to the root of the problem and wants to make you better..',
            ],
            [
                'name' => 'Larry',
                'date' => 'April 2021',
                'quote' => 'Good listener and sympathetic',
            ],
            [
                'name' => 'Carolyne',
                'date' => 'April 2024',
                'quote' => 'I was quite surprised how nice the Zoom Appointment went I had. I wasn\'t sure how it would go over but the doctor listened to me and seem sincerely concerned. By the end of the appointment I felt as tho I was in good hands.',
            ],
            [
                'name' => 'Anthony',
                'date' => 'December 2024',
                'quote' => 'Very informative and understanding.',
            ],
            [
                'name' => 'James',
                'date' => 'November 2024',
                'quote' => 'Excellent review of issue and medication. Time taken to explain problems',
            ],
            [
                'name' => 'Robert',
                'date' => 'November 2024',
                'quote' => 'Dr. Falola is very easy to talk to and very attentive to my concerns.',
            ],
            [
                'name' => 'Carl',
                'date' => 'November 2024',
                'quote' => 'I travel extensively for work and on short notice. I had been trying to find a Dr for over a year but had no luck finding an office that could accommodate my schedule. Dr. Falola has made getting care much easier. I find him to be pleasant.',
            ],
            [
                'name' => 'Danny',
                'date' => 'April 01 2025',
                'quote' => 'Dr Falola spent a great deal of time with me, listening to my every need. He is very knowledgeable in health and mental health. Easy to speak with, kind, gentle and understanding. I would definitely recommend Dr Falola .',
            ],
        ];
    }
}

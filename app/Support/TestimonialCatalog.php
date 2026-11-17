<?php

namespace App\Support;

/**
 * @phpstan-type Testimonial array{name: string, date: string, quote: string}
 */
final class TestimonialCatalog
{
    /** @var list<Testimonial> */
    private const TESTIMONIALS = [
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

    /** @return list<Testimonial> */
    public static function all(): array
    {
        return self::TESTIMONIALS;
    }
}

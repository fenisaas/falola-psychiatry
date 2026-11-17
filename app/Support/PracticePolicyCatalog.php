<?php

namespace App\Support;

/**
 * @phpstan-type PolicySection array{heading: string, paragraphs: list<string>, items?: list<string>}
 * @phpstan-type PracticePolicy array{title: string, summary: string, icon: string, sections: list<PolicySection>, review_note?: string}
 */
final class PracticePolicyCatalog
{
    /** @var list<string> */
    private const OFFICE_FEES = [
        'With Insurance: Only your co-pay required at the time of visit.',
        'For insurance plan with deductible, you may also be asked for a $100 deposit. After you receive an explanation of benefits, you may call our office for a refund of the difference in case of overpayment, or we will credit your account in case of overpayment.',
        'Without Insurance: The fees for self-pay:',
        'New patient consultation ($300): A new patient consultation is where we discuss your concerns, prior treatment, and treatment expectations. We will use this time to see if we are a good fit for each other and develop a treatment plan.',
        'Follow-up appointment ($175): Follow-up appointments are scheduled at a frequency agreed upon by you and Dr. Falola to fit your needs. Additional time is allotted when needed. Brief psychotherapy is included in every appointment.',
        'All past due balances and copays are due at the time of service. Insurance company contracts require that we collect copay on the date of service. There is a $30 fee for returned checks. We accept cash, check, debit cards, and most major credit cards.',
    ];

    /** @var list<PracticePolicy> */
    private const POLICIES = [
        [
            'title' => 'Check-In & Appointments',
            'summary' => 'Identification, account updates, visit charges, and payment expectations.',
            'icon' => 'calendar',
            'sections' => [
                [
                    'heading' => 'Check-In Process',
                    'paragraphs' => [
                        'A valid ID is required during check-in for every visit. A patient/parent/guardian must notify the office of changes in address, telephone number, or insurance.',
                    ],
                ],
            ],
            'review_note' => 'The self-pay amounts in this preserved wording conflict with amounts attached to legacy payment links and require practice confirmation before scheduling or paying.',
        ],
        [
            'title' => 'Cancellations & No-Shows',
            'summary' => 'Legacy notice, late-arrival, and cancellation-fee wording.',
            'icon' => 'money',
            'sections' => [
                [
                    'heading' => 'No Show / Late Cancellation',
                    'paragraphs' => [
                        'Your appointment spot has been reserved for you. Please be considerate of other patients and give 72-hour notice of canceled appointments. Arriving more than 10 minutes late or failing to reschedule an appointment more than one business day before the scheduled time will result in a No Show / Cancellation fee equal to the appointment fee.',
                    ],
                ],
            ],
            'review_note' => 'The cancellation timeline and fee should be confirmed by the practice before being treated as current.',
        ],
        [
            'title' => 'Telehealth (Telepsychiatry)',
            'summary' => 'Video and audio requirements, patient location, and controlled-medication language.',
            'icon' => 'monitor',
            'sections' => [
                [
                    'heading' => 'Telehealth',
                    'paragraphs' => [
                        'Telemedicine involves the use of electronic communications to enable the physician to connect with individuals using interactive video and audio communications. Ideally, telemedicine appointments should include both video and audio. If you do not have access to equipment needed for both video and audio appointments, an in-person appointment should be scheduled. Exceptions can be made on a case-by-case basis for established patients.',
                        'Telemedicine information will be sent to the patient at the beginning of the day. It is the patient’s responsibility to join the virtual visit at their scheduled appointment time. As a courtesy, you may receive a reminder call to join 5 minutes after your scheduled appointment time. It is your responsibility to contact the physician if you are having technical difficulties.',
                        'While it is not necessary for patients to be in Birmingham, patients must be physically located in the state of Alabama during the telemedicine appointment.',
                    ],
                ],
                [
                    'heading' => 'Telehealth & Controlled Substances',
                    'paragraphs' => [
                        'Telemedicine appointments are available to all patients with the means to do so. In-person visits may be required at least once every 12 months.',
                        '“The Drug Enforcement Administration (DEA), jointly with the Department of Health and Human Services (HHS), has extended the full set of telemedicine flexibilities regarding the prescribing of controlled medications that were in place during the COVID-19 public health emergency (PHE), through December 31, 2026. This includes: “A DEA-registered practitioner can prescribe a Schedule II–V controlled substance to a patient using telemedicine without having conducted an in-person medical evaluation if required conditions are met.”',
                    ],
                ],
            ],
            'review_note' => 'The federal prescribing statement is time-sensitive and expires at the end of December 31, 2026. Telehealth and controlled-substance policies require professional legal and clinical review.',
        ],
        [
            'title' => 'Medication Refills & Controlled Substances',
            'summary' => 'Refill timing, visit requirements, lost medication, screening, and prescriber discretion.',
            'icon' => 'pill',
            'sections' => [
                [
                    'heading' => 'Medication Refills',
                    'paragraphs' => [
                        'Medication refills for chronic stable conditions can be requested by phone during business hours if you have been seen in the previous 3 months. Please request all necessary refills during office or telehealth visits. Please note that if you are out of refills, you may be due for a follow-up appointment.',
                        'Please allow at least 48–72 hours for a response.',
                        'It is your responsibility, as the patient, to notify your physician if you need a refill at your scheduled appointments. The physician reserves the right to refuse medication refills in the case of failure to show or frequently canceling your appointments, whereby your medications would be refilled. This could also lead to dismissal/discharge from the practice. Please note that no refills will be called in after hours or on weekends.',
                    ],
                ],
                [
                    'heading' => 'Controlled Substances',
                    'paragraphs' => [
                        'Controlled substances (medications such as Adderall, Ritalin, Klonopin, etc.) will be issued in intervals no greater than 3 months at a time. Because these medications are highly regulated, appointments must be kept in order to receive refills.',
                        'In the event the medication is lost, it will not be rewritten until the next refill time. Patients are subject to random urine drug screenings while being prescribed controlled medications. The physician reserves the right to refuse medication refills and/or dismiss a patient from the practice due to failure to complete urine drug screenings when requested.',
                        'The Pain Management Act of 2013 requires any patient on a Schedule II narcotic to be seen at least every three months.',
                        'All new patients are subject to a query in the Controlled Substance Database. If the database reveals that you have been dismissed from a pain management clinic or have been visiting multiple physicians for narcotic medications, we may decline to take over or withdraw from your care. This is subject to each physician\'s discretion.',
                    ],
                ],
            ],
            'review_note' => 'Controlled-substance terminology, legal citations, visit intervals, database use, and screening requirements require professional review before being treated as current policy.',
        ],
        [
            'title' => 'Laboratory Testing',
            'summary' => 'Requested laboratory work, urine drug screening, costs, refill holds, and pill counts.',
            'icon' => 'lab',
            'sections' => [
                [
                    'heading' => 'Laboratory Policy',
                    'paragraphs' => [
                        'It may be medically necessary for your physician to request lab or urine drug screens (UDS) to provide the best possible treatment. It is your responsibility, as our patient, to obtain the requested exams; these tests are a part of your treatment plan. Our office will assist you as much as possible, but testing may require you to visit an outside facility.',
                        'If you do not obtain the tests within a reasonable time frame, your physician reserves the right to refuse a refill or prescribe further medications until tests are completed.',
                        'UDSs are performed on patients when necessary. All new patients and patients who are prescribed controlled medications may be required to have an initial UDS. Any charges that may result from the UDS will be the responsibility of the patient if not covered by the insurance company.',
                        'UDSs are required every 3 to 6 months. We reserve the right to call you in for a random UDS and pill count.',
                    ],
                ],
            ],
            'review_note' => 'Testing frequency, cost responsibility, and prescribing consequences require current clinical and legal approval.',
        ],
        [
            'title' => 'Treatment Communications',
            'summary' => 'Response timing, urgent needs, safety concerns, and scheduling language.',
            'icon' => 'chat',
            'sections' => [
                [
                    'heading' => 'Treatment Issues',
                    'paragraphs' => [
                        'Nonurgent phone calls and messages will be addressed during regular business hours. Please allow up to 2 business days for a response. Please do not wait until a crisis to contact the office. We are able to address routine concerns much more effectively than crisis concerns.',
                        'Existing patients can call or text (659)346 6314 for urgent needs. If your concern involves a safety issue, please call 911 or go to your nearest emergency department. Existing patients are also welcome to schedule an urgent appointment using online scheduling.',
                    ],
                ],
            ],
            'review_note' => 'Business hours, texting authorization, response expectations, urgent scheduling, and emergency wording require practice approval.',
        ],
        [
            'title' => 'Medical Records & Documentation',
            'summary' => 'Physician-signature forms, record transfers, paper copies, and absence notes.',
            'icon' => 'document',
            'sections' => [
                [
                    'heading' => 'Others',
                    'paragraphs' => [
                        'There may be document fees for any form which requires a physician signature.',
                        'Medical records can be faxed to other physicians free of charge. Paper copies of records for any other reason are subject to a printing/copy fee according to law (CMS.org).',
                        'An excused absence for school or work will only be issued if the patient was actually seen in the office.',
                    ],
                ],
            ],
            'review_note' => 'The legacy “CMS.org” reference is ambiguous. Record-copy fees and documentation practices require legal and operational review.',
        ],
        [
            'title' => 'Patient Dismissal',
            'summary' => 'Effects, medication transition, common reasons, and notice method.',
            'icon' => 'shield',
            'sections' => [
                [
                    'heading' => 'Discharge/ Dismissal',
                    'paragraphs' => [
                        'On very rare occasions, a patient may be dismissed/discharged from the practice. If you are dismissed/discharged from the practice, it means you can no longer schedule appointments, get medication refills, or consider us to be your physician.',
                        'Medications will be provided at the physician’s discretion with a minimum of 30 days.',
                        'Common reasons for dismissal/discharge include failure to keep appointments, abuse (verbal or physical) toward staff, failure to pay bills, etc.',
                        'A letter will be sent to your listed address notifying you of dismissal/discharge.',
                    ],
                ],
            ],
            'review_note' => 'Dismissal grounds, notice, continuity-of-care obligations, and medication-transition language require professional review.',
        ],
        [
            'title' => 'Privacy & HIPAA',
            'summary' => 'Chart access, disclosures, releases, collections, consultation, and minor confidentiality.',
            'icon' => 'lock',
            'sections' => [
                [
                    'heading' => 'Privacy & HIPAA',
                    'paragraphs' => [
                        'Patient information in the electronic medical chart is accessible to other clinicians for purposes of emergency coverage if Dr. Falola is not available. Limited information is accessible to trained staff for scheduling and medication refill purposes. However, no information about you or your care will be released to anyone outside the office without your written consent or a court order.',
                        'There is no guarantee of confidentiality under the following conditions:',
                    ],
                    'items' => [
                        'If I suspect you/your child is in imminent danger of harm to self or others, or a child or elderly person is being abused or neglected (as I am a mandated reporter)',
                        'If a court orders a release of information',
                        'If you initiate a malpractice lawsuit or a billing dispute with a financial institution',
                        'If your insurance company requests to review your/your child’s case',
                        'If you pay by credit card, my name will appear on your credit card statement',
                        'If you do not pay your bill, your balance due statement (including diagnostic and procedural codes) may be sent to a collections agency or other responsible party',
                        'Between me and my administrative staff, or colleagues with whom I consult professionally',
                    ],
                ],
                [
                    'heading' => 'Release and Minor Confidentiality',
                    'paragraphs' => [
                        'You may complete a Release of Information for any person(s) you would like to give permission to discuss information concerning care and/or financial matters concerning your account at Falola Psychiatry Practice.',
                        'Children (under the age of 17) have the right to confidential exchanges with clinicians.',
                    ],
                ],
            ],
            'review_note' => 'This legacy text is not a substitute for an approved Notice of Privacy Practices. Disclosure, collections, minor-confidentiality, and acknowledgement language require legal review.',
        ],
    ];

    /** @return list<PracticePolicy> */
    public static function all(): array
    {
        return self::POLICIES;
    }

    /** @return list<string> */
    public static function officeFees(): array
    {
        return self::OFFICE_FEES;
    }
}

<?php
/**
 * Default content from Figma V1 (used when ACF empty / not installed).
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

function mca_site_defaults() {
    return array(
        'phone'          => '+353 (0) 1 900 1234',
        'email'          => 'info@mychartered.ie',
        'whatsapp_url'   => 'https://wa.me/35319001234',
        'address'        => "12 Fitzwilliam Place\nDublin 2, D02 XY45\nIreland",
        'linkedin'       => 'https://linkedin.com',
        'twitter'        => 'https://twitter.com',
        'facebook'       => 'https://facebook.com',
        'cta_label'      => 'Book a Consultation',
        'trust_items'    => array(
            'Chartered Accountants Ireland',
            'Irish Tax Institute',
            'UK & Ireland Regulatory Coverage',
            'CRO Registered Agent',
            '15+ Years Combined Experience',
        ),
    );
}

function mca_opt($key) {
    $defaults = mca_site_defaults();
    $default  = isset($defaults[$key]) ? $defaults[$key] : '';
    $value    = mca_field($key, $default, 'option');

    // Normalise ACF repeater trust_items to a flat string list.
    if ($key === 'trust_items' && is_array($value)) {
        $flat = array();
        foreach ($value as $row) {
            if (is_string($row)) {
                $flat[] = $row;
            } elseif (is_array($row) && !empty($row['label'])) {
                $flat[] = $row['label'];
            }
        }
        return $flat ? $flat : $defaults['trust_items'];
    }

    return $value;
}

function mca_default_nav_items() {
    return array(
        array('label' => 'Home', 'url' => home_url('/')),
        array('label' => 'About Us', 'url' => home_url('/about-us/')),
        array(
            'label'    => 'Who We Help',
            'url'      => home_url('/who-we-help/'),
            'children' => array(
                array('label' => 'Sole Traders', 'url' => home_url('/who-we-help/sole-traders/')),
                array('label' => 'Limited Companies', 'url' => home_url('/who-we-help/limited-companies/')),
                array('label' => 'Contractors', 'url' => home_url('/who-we-help/contractors/')),
                array('label' => 'Small Businesses', 'url' => home_url('/who-we-help/small-businesses/')),
                array('label' => 'Partnerships', 'url' => home_url('/who-we-help/partnerships/')),
                array('label' => 'LLPs', 'url' => home_url('/who-we-help/llps/')),
                array('label' => 'Corporate Businesses', 'url' => home_url('/who-we-help/corporate-businesses/')),
            ),
        ),
        array(
            'label'    => 'Services',
            'url'      => home_url('/services/'),
            'children' => array(
                array('label' => 'Accounting', 'url' => home_url('/services/accounting/')),
                array('label' => 'Taxation', 'url' => home_url('/services/taxation/')),
                array('label' => 'Assurance', 'url' => home_url('/services/assurance/')),
                array('label' => 'Bookkeeping', 'url' => home_url('/services/bookkeeping/')),
                array('label' => 'Corporate Compliance', 'url' => home_url('/services/corporate-compliance/')),
                array('label' => 'International Services', 'url' => home_url('/services/international-services/')),
                array('label' => 'Start-ups', 'url' => home_url('/services/start-ups/')),
                array('label' => 'Mergers & Acquisitions', 'url' => home_url('/services/mergers-acquisitions/')),
                array('label' => 'Business Recovery', 'url' => home_url('/services/business-recovery/')),
                array('label' => 'Training', 'url' => home_url('/services/training/')),
            ),
        ),
        array('label' => 'News', 'url' => home_url('/news/')),
        array('label' => 'Contact Us', 'url' => home_url('/contact-us/')),
    );
}

function mca_audiences() {
    return array(
        array(
            'title' => 'Sole Traders',
            'text'  => 'Clear, stress-free compliance and strategic tax optimization for independent operators.',
            'url'   => home_url('/who-we-help/sole-traders/'),
        ),
        array(
            'title' => 'Limited Companies',
            'text'  => 'Full statutory compliance, smart advisory support, and back-office integration.',
            'url'   => home_url('/who-we-help/limited-companies/'),
        ),
        array(
            'title' => 'Contractors',
            'text'  => 'Maximise take-home pay legally with bespoke umbrella and contractor company structures.',
            'url'   => home_url('/who-we-help/contractors/'),
        ),
        array(
            'title' => 'Small Businesses',
            'text'  => 'Scalable monthly financial packages, bookkeeping solutions, and clear, practical payroll.',
            'url'   => home_url('/who-we-help/small-businesses/'),
        ),
        array(
            'title' => 'Partnerships',
            'text'  => 'Equitable tax distributions, dynamic partnership tax structuring, and compliance alignment.',
            'url'   => home_url('/who-we-help/partnerships/'),
        ),
        array(
            'title' => 'Corporate Businesses',
            'text'  => 'Premium corporate tax structuring, deep multi-jurisdiction compliance, and interim CFO advisory.',
            'url'   => home_url('/who-we-help/corporate-businesses/'),
        ),
    );
}

function mca_services_preview() {
    return array(
        array(
            'title' => 'Accounting',
            'text'  => 'Preparation of clean annual statutory accounts, detailed management reporting, and expert cash flow forecasting.',
            'url'   => home_url('/services/accounting/'),
            'image' => mca_asset('img/service-1.png'),
        ),
        array(
            'title' => 'Taxation',
            'text'  => 'Surgical corporate tax strategy, VAT returns, personal income tax compliance, and cross-border advisory.',
            'url'   => home_url('/services/taxation/'),
            'image' => mca_asset('img/service-2.png'),
        ),
        array(
            'title' => 'Assurance',
            'text'  => 'Meticulous internal systems audits, independent financial health examinations, and operational risk mitigation.',
            'url'   => home_url('/services/assurance/'),
            'image' => mca_asset('img/service-3.png'),
        ),
        array(
            'title' => 'Bookkeeping',
            'text'  => 'Automated modern cloud accounting integrations (Xero, QuickBooks), real-time reconciliations, and clean receipt management.',
            'url'   => home_url('/services/bookkeeping/'),
            'image' => mca_asset('img/service-4.png'),
        ),
        array(
            'title' => 'Corporate Compliance',
            'text'  => 'Expert guidance for CRO filings, company secretarial support, initial corporate registrations, and statutory record keeping.',
            'url'   => home_url('/services/corporate-compliance/'),
            'image' => mca_asset('img/service-5.png'),
        ),
        array(
            'title' => 'International Services',
            'text'  => 'Proactive structuring for businesses trading across Ireland & UK, EU VAT compliance, and multi-jurisdictional advice.',
            'url'   => home_url('/services/international-services/'),
            'image' => mca_asset('img/service-6.png'),
        ),
    );
}

function mca_why_items() {
    return array(
        array('num' => '01', 'title' => 'Personalised Support', 'text' => 'No automated queues. You receive dedicated access to direct experts who truly align with your specific company trajectory.'),
        array('num' => '02', 'title' => 'Professional Expertise', 'text' => 'Rigorous standards maintained by qualified Irish & UK Chartered Accountants with a pristine tracking history.'),
        array('num' => '03', 'title' => 'Proactive Advice', 'text' => 'We look ahead of deadlines and legislation changes so your business stays ready, not reactive.'),
        array('num' => '04', 'title' => 'Transparent Process', 'text' => 'Clear reporting, predictable timelines, and open communication at every stage of the engagement.'),
        array('num' => '05', 'title' => 'Trusted Partnership', 'text' => 'Long-term relationships built on discretion, reliability, and measurable commercial outcomes.'),
    );
}

function mca_how_steps() {
    return array(
        array('num' => '01', 'title' => 'Discovery Call', 'text' => 'We learn your structure, goals, and pain points in a focused introductory conversation.'),
        array('num' => '02', 'title' => 'Tailored Proposal', 'text' => 'You receive a clear scope, timelines, and pricing matched to how your business operates.'),
        array('num' => '03', 'title' => 'Onboarding', 'text' => 'Systems, access, and reporting rhythms are set up so work starts smoothly from day one.'),
        array('num' => '04', 'title' => 'Ongoing Support', 'text' => 'Compliance runs in the background while advisory keeps you informed and ahead.'),
    );
}

function mca_testimonials() {
    return array(
        array(
            'quote'  => 'My Chartered Accountants transformed how we manage our finances. Clear advice, fast responses, and genuine partnership.',
            'name'   => 'Sarah O\'Neill',
            'role'   => 'Managing Director, Dublin SME',
            'avatar' => mca_asset('img/testimonial-1.png'),
        ),
        array(
            'quote' => 'Finally an accounting firm that explains tax in plain English and helps us plan, not just file.',
            'name'  => 'James Byrne',
            'role'  => 'Contractor',
        ),
        array(
            'quote' => 'Cross-border UK and Ireland work used to be stressful. MCA made it straightforward.',
            'name'  => 'Aoife Murphy',
            'role'  => 'Founder, Limited Company',
        ),
    );
}

function mca_all_services_list() {
    return array(
        array('slug' => 'accounting', 'title' => 'Accounting', 'parent' => 'services'),
        array('slug' => 'taxation', 'title' => 'Taxation', 'parent' => 'services'),
        array('slug' => 'assurance', 'title' => 'Assurance', 'parent' => 'services'),
        array('slug' => 'bookkeeping', 'title' => 'Bookkeeping', 'parent' => 'services'),
        array('slug' => 'corporate-compliance', 'title' => 'Corporate Compliance', 'parent' => 'services'),
        array('slug' => 'international-services', 'title' => 'International Services', 'parent' => 'services'),
        array('slug' => 'start-ups', 'title' => 'Start-ups', 'parent' => 'services'),
        array('slug' => 'mergers-acquisitions', 'title' => 'Mergers & Acquisitions', 'parent' => 'services'),
        array('slug' => 'business-recovery', 'title' => 'Business Recovery', 'parent' => 'services'),
        array('slug' => 'training', 'title' => 'Training', 'parent' => 'services'),
    );
}

function mca_all_audiences_list() {
    return array(
        array('slug' => 'sole-traders', 'title' => 'Sole Traders', 'parent' => 'who-we-help'),
        array('slug' => 'limited-companies', 'title' => 'Limited Companies', 'parent' => 'who-we-help'),
        array('slug' => 'contractors', 'title' => 'Contractors', 'parent' => 'who-we-help'),
        array('slug' => 'small-businesses', 'title' => 'Small Businesses', 'parent' => 'who-we-help'),
        array('slug' => 'partnerships', 'title' => 'Partnerships', 'parent' => 'who-we-help'),
        array('slug' => 'llps', 'title' => 'LLPs', 'parent' => 'who-we-help'),
        array('slug' => 'corporate-businesses', 'title' => 'Corporate Businesses', 'parent' => 'who-we-help'),
    );
}

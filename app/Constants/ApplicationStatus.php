<?php

namespace App\Constants;

class ApplicationStatus
{
    const PENDING = 'Pending';
    const ACCEPTED = 'Accepted';
    const REJECTED = 'Rejected';
    const WITHDRAWN = 'Withdrawn';
    const INTERVIEWING = 'Interviewing';
    const OFFER_SENT = 'Offer Sent';
    const OFFER_ACCEPTED = 'Offer Accepted';
    const OFFER_REJECTED = 'Offer Rejected';

    public static function getStatuses(): array
    {
        return [
            self::PENDING,
            self::ACCEPTED,
            self::REJECTED,
            self::WITHDRAWN,
            self::INTERVIEWING,
            self::OFFER_SENT,
            self::OFFER_ACCEPTED,
            self::OFFER_REJECTED,
        ];
    }
}

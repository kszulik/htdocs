<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/services/content_creator_insights_service.proto

namespace Google\Ads\GoogleAds\V18\Services\GenerateCreatorInsightsRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The audience attributes (such as Age, Gender, Affinity, and In-Market) and
 * creator attributes (such as creator location and creator's content topics)
 * used to search for top creators.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.services.GenerateCreatorInsightsRequest.SearchAttributes</code>
 */
class SearchAttributes extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. Audience attributes that describe an audience of viewers. This
     * is used to search for creators whose own viewers match the input
     * audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.AudienceInsightsAttribute audience_attributes = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $audience_attributes;
    /**
     * Optional. Creator attributes that describe a collection of types of
     * content. This is used to search for creators whose content matches the
     * input creator attributes.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.AudienceInsightsAttribute creator_attributes = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $creator_attributes;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V18\Common\AudienceInsightsAttribute>|\Google\Protobuf\Internal\RepeatedField $audience_attributes
     *           Optional. Audience attributes that describe an audience of viewers. This
     *           is used to search for creators whose own viewers match the input
     *           audience.
     *     @type array<\Google\Ads\GoogleAds\V18\Common\AudienceInsightsAttribute>|\Google\Protobuf\Internal\RepeatedField $creator_attributes
     *           Optional. Creator attributes that describe a collection of types of
     *           content. This is used to search for creators whose content matches the
     *           input creator attributes.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Services\ContentCreatorInsightsService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. Audience attributes that describe an audience of viewers. This
     * is used to search for creators whose own viewers match the input
     * audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.AudienceInsightsAttribute audience_attributes = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAudienceAttributes()
    {
        return $this->audience_attributes;
    }

    /**
     * Optional. Audience attributes that describe an audience of viewers. This
     * is used to search for creators whose own viewers match the input
     * audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.AudienceInsightsAttribute audience_attributes = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V18\Common\AudienceInsightsAttribute>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAudienceAttributes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V18\Common\AudienceInsightsAttribute::class);
        $this->audience_attributes = $arr;

        return $this;
    }

    /**
     * Optional. Creator attributes that describe a collection of types of
     * content. This is used to search for creators whose content matches the
     * input creator attributes.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.AudienceInsightsAttribute creator_attributes = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCreatorAttributes()
    {
        return $this->creator_attributes;
    }

    /**
     * Optional. Creator attributes that describe a collection of types of
     * content. This is used to search for creators whose content matches the
     * input creator attributes.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.AudienceInsightsAttribute creator_attributes = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V18\Common\AudienceInsightsAttribute>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCreatorAttributes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V18\Common\AudienceInsightsAttribute::class);
        $this->creator_attributes = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchAttributes::class, \Google\Ads\GoogleAds\V18\Services\GenerateCreatorInsightsRequest_SearchAttributes::class);

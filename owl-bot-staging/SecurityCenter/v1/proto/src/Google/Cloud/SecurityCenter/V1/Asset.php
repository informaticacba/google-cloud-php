<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/securitycenter/v1/asset.proto

namespace Google\Cloud\SecurityCenter\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Security Command Center representation of a Google Cloud
 * resource.
 * The Asset is a Security Command Center resource that captures information
 * about a single Google Cloud resource. All modifications to an Asset are only
 * within the context of Security Command Center and don't affect the referenced
 * Google Cloud resource.
 *
 * Generated from protobuf message <code>google.cloud.securitycenter.v1.Asset</code>
 */
class Asset extends \Google\Protobuf\Internal\Message
{
    /**
     * The relative resource name of this asset. See:
     * https://cloud.google.com/apis/design/resource_names#relative_resource_name
     * Example:
     * "organizations/{organization_id}/assets/{asset_id}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    protected $name = '';
    /**
     * Security Command Center managed properties. These properties are managed by
     * Security Command Center and cannot be modified by the user.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Asset.SecurityCenterProperties security_center_properties = 2;</code>
     */
    protected $security_center_properties = null;
    /**
     * Resource managed properties. These properties are managed and defined by
     * the Google Cloud resource and cannot be modified by the user.
     *
     * Generated from protobuf field <code>map<string, .google.protobuf.Value> resource_properties = 7;</code>
     */
    private $resource_properties;
    /**
     * User specified security marks. These marks are entirely managed by the user
     * and come from the SecurityMarks resource that belongs to the asset.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.SecurityMarks security_marks = 8;</code>
     */
    protected $security_marks = null;
    /**
     * The time at which the asset was created in Security Command Center.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 9;</code>
     */
    protected $create_time = null;
    /**
     * The time at which the asset was last updated or added in Cloud SCC.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 10;</code>
     */
    protected $update_time = null;
    /**
     * Cloud IAM Policy information associated with the Google Cloud resource
     * described by the Security Command Center asset. This information is managed
     * and defined by the Google Cloud resource and cannot be modified by the
     * user.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Asset.IamPolicy iam_policy = 11;</code>
     */
    protected $iam_policy = null;
    /**
     * The canonical name of the resource. It's either
     * "organizations/{organization_id}/assets/{asset_id}",
     * "folders/{folder_id}/assets/{asset_id}" or
     * "projects/{project_number}/assets/{asset_id}", depending on the closest CRM
     * ancestor of the resource.
     *
     * Generated from protobuf field <code>string canonical_name = 13;</code>
     */
    protected $canonical_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The relative resource name of this asset. See:
     *           https://cloud.google.com/apis/design/resource_names#relative_resource_name
     *           Example:
     *           "organizations/{organization_id}/assets/{asset_id}".
     *     @type \Google\Cloud\SecurityCenter\V1\Asset\SecurityCenterProperties $security_center_properties
     *           Security Command Center managed properties. These properties are managed by
     *           Security Command Center and cannot be modified by the user.
     *     @type array|\Google\Protobuf\Internal\MapField $resource_properties
     *           Resource managed properties. These properties are managed and defined by
     *           the Google Cloud resource and cannot be modified by the user.
     *     @type \Google\Cloud\SecurityCenter\V1\SecurityMarks $security_marks
     *           User specified security marks. These marks are entirely managed by the user
     *           and come from the SecurityMarks resource that belongs to the asset.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           The time at which the asset was created in Security Command Center.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           The time at which the asset was last updated or added in Cloud SCC.
     *     @type \Google\Cloud\SecurityCenter\V1\Asset\IamPolicy $iam_policy
     *           Cloud IAM Policy information associated with the Google Cloud resource
     *           described by the Security Command Center asset. This information is managed
     *           and defined by the Google Cloud resource and cannot be modified by the
     *           user.
     *     @type string $canonical_name
     *           The canonical name of the resource. It's either
     *           "organizations/{organization_id}/assets/{asset_id}",
     *           "folders/{folder_id}/assets/{asset_id}" or
     *           "projects/{project_number}/assets/{asset_id}", depending on the closest CRM
     *           ancestor of the resource.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Securitycenter\V1\Asset::initOnce();
        parent::__construct($data);
    }

    /**
     * The relative resource name of this asset. See:
     * https://cloud.google.com/apis/design/resource_names#relative_resource_name
     * Example:
     * "organizations/{organization_id}/assets/{asset_id}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The relative resource name of this asset. See:
     * https://cloud.google.com/apis/design/resource_names#relative_resource_name
     * Example:
     * "organizations/{organization_id}/assets/{asset_id}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Security Command Center managed properties. These properties are managed by
     * Security Command Center and cannot be modified by the user.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Asset.SecurityCenterProperties security_center_properties = 2;</code>
     * @return \Google\Cloud\SecurityCenter\V1\Asset\SecurityCenterProperties|null
     */
    public function getSecurityCenterProperties()
    {
        return $this->security_center_properties;
    }

    public function hasSecurityCenterProperties()
    {
        return isset($this->security_center_properties);
    }

    public function clearSecurityCenterProperties()
    {
        unset($this->security_center_properties);
    }

    /**
     * Security Command Center managed properties. These properties are managed by
     * Security Command Center and cannot be modified by the user.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Asset.SecurityCenterProperties security_center_properties = 2;</code>
     * @param \Google\Cloud\SecurityCenter\V1\Asset\SecurityCenterProperties $var
     * @return $this
     */
    public function setSecurityCenterProperties($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\SecurityCenter\V1\Asset\SecurityCenterProperties::class);
        $this->security_center_properties = $var;

        return $this;
    }

    /**
     * Resource managed properties. These properties are managed and defined by
     * the Google Cloud resource and cannot be modified by the user.
     *
     * Generated from protobuf field <code>map<string, .google.protobuf.Value> resource_properties = 7;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getResourceProperties()
    {
        return $this->resource_properties;
    }

    /**
     * Resource managed properties. These properties are managed and defined by
     * the Google Cloud resource and cannot be modified by the user.
     *
     * Generated from protobuf field <code>map<string, .google.protobuf.Value> resource_properties = 7;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setResourceProperties($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Protobuf\Value::class);
        $this->resource_properties = $arr;

        return $this;
    }

    /**
     * User specified security marks. These marks are entirely managed by the user
     * and come from the SecurityMarks resource that belongs to the asset.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.SecurityMarks security_marks = 8;</code>
     * @return \Google\Cloud\SecurityCenter\V1\SecurityMarks|null
     */
    public function getSecurityMarks()
    {
        return $this->security_marks;
    }

    public function hasSecurityMarks()
    {
        return isset($this->security_marks);
    }

    public function clearSecurityMarks()
    {
        unset($this->security_marks);
    }

    /**
     * User specified security marks. These marks are entirely managed by the user
     * and come from the SecurityMarks resource that belongs to the asset.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.SecurityMarks security_marks = 8;</code>
     * @param \Google\Cloud\SecurityCenter\V1\SecurityMarks $var
     * @return $this
     */
    public function setSecurityMarks($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\SecurityCenter\V1\SecurityMarks::class);
        $this->security_marks = $var;

        return $this;
    }

    /**
     * The time at which the asset was created in Security Command Center.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 9;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * The time at which the asset was created in Security Command Center.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 9;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * The time at which the asset was last updated or added in Cloud SCC.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 10;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * The time at which the asset was last updated or added in Cloud SCC.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 10;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Cloud IAM Policy information associated with the Google Cloud resource
     * described by the Security Command Center asset. This information is managed
     * and defined by the Google Cloud resource and cannot be modified by the
     * user.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Asset.IamPolicy iam_policy = 11;</code>
     * @return \Google\Cloud\SecurityCenter\V1\Asset\IamPolicy|null
     */
    public function getIamPolicy()
    {
        return $this->iam_policy;
    }

    public function hasIamPolicy()
    {
        return isset($this->iam_policy);
    }

    public function clearIamPolicy()
    {
        unset($this->iam_policy);
    }

    /**
     * Cloud IAM Policy information associated with the Google Cloud resource
     * described by the Security Command Center asset. This information is managed
     * and defined by the Google Cloud resource and cannot be modified by the
     * user.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Asset.IamPolicy iam_policy = 11;</code>
     * @param \Google\Cloud\SecurityCenter\V1\Asset\IamPolicy $var
     * @return $this
     */
    public function setIamPolicy($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\SecurityCenter\V1\Asset\IamPolicy::class);
        $this->iam_policy = $var;

        return $this;
    }

    /**
     * The canonical name of the resource. It's either
     * "organizations/{organization_id}/assets/{asset_id}",
     * "folders/{folder_id}/assets/{asset_id}" or
     * "projects/{project_number}/assets/{asset_id}", depending on the closest CRM
     * ancestor of the resource.
     *
     * Generated from protobuf field <code>string canonical_name = 13;</code>
     * @return string
     */
    public function getCanonicalName()
    {
        return $this->canonical_name;
    }

    /**
     * The canonical name of the resource. It's either
     * "organizations/{organization_id}/assets/{asset_id}",
     * "folders/{folder_id}/assets/{asset_id}" or
     * "projects/{project_number}/assets/{asset_id}", depending on the closest CRM
     * ancestor of the resource.
     *
     * Generated from protobuf field <code>string canonical_name = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setCanonicalName($var)
    {
        GPBUtil::checkString($var, True);
        $this->canonical_name = $var;

        return $this;
    }

}


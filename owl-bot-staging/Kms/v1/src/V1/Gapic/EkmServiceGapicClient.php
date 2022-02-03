<?php
/*
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/kms/v1/ekm_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Kms\V1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\Call;
use Google\ApiCore\CredentialsWrapper;

use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Iam\V1\GetIamPolicyRequest;
use Google\Cloud\Iam\V1\GetPolicyOptions;
use Google\Cloud\Iam\V1\Policy;
use Google\Cloud\Iam\V1\SetIamPolicyRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsResponse;
use Google\Cloud\Kms\V1\CreateEkmConnectionRequest;
use Google\Cloud\Kms\V1\EkmConnection;
use Google\Cloud\Kms\V1\GetEkmConnectionRequest;
use Google\Cloud\Kms\V1\ListEkmConnectionsRequest;
use Google\Cloud\Kms\V1\ListEkmConnectionsResponse;
use Google\Cloud\Kms\V1\UpdateEkmConnectionRequest;
use Google\Protobuf\FieldMask;

/**
 * Service Description: Google Cloud Key Management EKM Service
 *
 * Manages external cryptographic keys and operations using those keys.
 * Implements a REST model with the following objects:
 * * [EkmConnection][google.cloud.kms.v1.EkmConnection]
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $ekmServiceClient = new EkmServiceClient();
 * try {
 *     $formattedParent = $ekmServiceClient->locationName('[PROJECT]', '[LOCATION]');
 *     $ekmConnectionId = 'ekm_connection_id';
 *     $ekmConnection = new EkmConnection();
 *     $response = $ekmServiceClient->createEkmConnection($formattedParent, $ekmConnectionId, $ekmConnection);
 * } finally {
 *     $ekmServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 */
class EkmServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.kms.v1.EkmService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'cloudkms.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/cloudkms',
    ];

    private static $ekmConnectionNameTemplate;

    private static $locationNameTemplate;

    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/ekm_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/ekm_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/ekm_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/ekm_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getEkmConnectionNameTemplate()
    {
        if (self::$ekmConnectionNameTemplate == null) {
            self::$ekmConnectionNameTemplate = new PathTemplate('projects/{project}/locations/{location}/ekmConnections/{ekm_connection}');
        }

        return self::$ekmConnectionNameTemplate;
    }

    private static function getLocationNameTemplate()
    {
        if (self::$locationNameTemplate == null) {
            self::$locationNameTemplate = new PathTemplate('projects/{project}/locations/{location}');
        }

        return self::$locationNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'ekmConnection' => self::getEkmConnectionNameTemplate(),
                'location' => self::getLocationNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * ekm_connection resource.
     *
     * @param string $project
     * @param string $location
     * @param string $ekmConnection
     *
     * @return string The formatted ekm_connection resource.
     */
    public static function ekmConnectionName($project, $location, $ekmConnection)
    {
        return self::getEkmConnectionNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'ekm_connection' => $ekmConnection,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a location
     * resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     */
    public static function locationName($project, $location)
    {
        return self::getLocationNameTemplate()->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - ekmConnection: projects/{project}/locations/{location}/ekmConnections/{ekm_connection}
     * - location: projects/{project}/locations/{location}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();
        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }

        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'cloudkms.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $serviceAddress setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Creates a new [EkmConnection][google.cloud.kms.v1.EkmConnection] in a given
     * Project and Location.
     *
     * Sample code:
     * ```
     * $ekmServiceClient = new EkmServiceClient();
     * try {
     *     $formattedParent = $ekmServiceClient->locationName('[PROJECT]', '[LOCATION]');
     *     $ekmConnectionId = 'ekm_connection_id';
     *     $ekmConnection = new EkmConnection();
     *     $response = $ekmServiceClient->createEkmConnection($formattedParent, $ekmConnectionId, $ekmConnection);
     * } finally {
     *     $ekmServiceClient->close();
     * }
     * ```
     *
     * @param string        $parent          Required. The resource name of the location associated with the
     *                                       [EkmConnection][google.cloud.kms.v1.EkmConnection], in the format
     *                                       `projects/&#42;/locations/*`.
     * @param string        $ekmConnectionId Required. It must be unique within a location and match the regular
     *                                       expression `[a-zA-Z0-9_-]{1,63}`.
     * @param EkmConnection $ekmConnection   Required. An [EkmConnection][google.cloud.kms.v1.EkmConnection] with
     *                                       initial field values.
     * @param array         $optionalArgs    {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Kms\V1\EkmConnection
     *
     * @throws ApiException if the remote call fails
     */
    public function createEkmConnection($parent, $ekmConnectionId, $ekmConnection, array $optionalArgs = [])
    {
        $request = new CreateEkmConnectionRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $request->setEkmConnectionId($ekmConnectionId);
        $request->setEkmConnection($ekmConnection);
        $requestParamHeaders['parent'] = $parent;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('CreateEkmConnection', EkmConnection::class, $optionalArgs, $request)->wait();
    }

    /**
     * Returns metadata for a given
     * [EkmConnection][google.cloud.kms.v1.EkmConnection].
     *
     * Sample code:
     * ```
     * $ekmServiceClient = new EkmServiceClient();
     * try {
     *     $formattedName = $ekmServiceClient->ekmConnectionName('[PROJECT]', '[LOCATION]', '[EKM_CONNECTION]');
     *     $response = $ekmServiceClient->getEkmConnection($formattedName);
     * } finally {
     *     $ekmServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The [name][google.cloud.kms.v1.EkmConnection.name] of the
     *                             [EkmConnection][google.cloud.kms.v1.EkmConnection] to get.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Kms\V1\EkmConnection
     *
     * @throws ApiException if the remote call fails
     */
    public function getEkmConnection($name, array $optionalArgs = [])
    {
        $request = new GetEkmConnectionRequest();
        $requestParamHeaders = [];
        $request->setName($name);
        $requestParamHeaders['name'] = $name;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetEkmConnection', EkmConnection::class, $optionalArgs, $request)->wait();
    }

    /**
     * Lists [EkmConnections][google.cloud.kms.v1.EkmConnection].
     *
     * Sample code:
     * ```
     * $ekmServiceClient = new EkmServiceClient();
     * try {
     *     $formattedParent = $ekmServiceClient->locationName('[PROJECT]', '[LOCATION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $ekmServiceClient->listEkmConnections($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $ekmServiceClient->listEkmConnections($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $ekmServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the location associated with the
     *                             [EkmConnections][google.cloud.kms.v1.EkmConnection] to list, in the format
     *                             `projects/&#42;/locations/*`.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type string $filter
     *           Optional. Only include resources that match the filter in the response. For
     *           more information, see
     *           [Sorting and filtering list
     *           results](https://cloud.google.com/kms/docs/sorting-and-filtering).
     *     @type string $orderBy
     *           Optional. Specify how the results should be sorted. If not specified, the
     *           results will be sorted in the default order.  For more information, see
     *           [Sorting and filtering list
     *           results](https://cloud.google.com/kms/docs/sorting-and-filtering).
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listEkmConnections($parent, array $optionalArgs = [])
    {
        $request = new ListEkmConnectionsRequest();
        $requestParamHeaders = [];
        $request->setParent($parent);
        $requestParamHeaders['parent'] = $parent;
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->getPagedListResponse('ListEkmConnections', $optionalArgs, ListEkmConnectionsResponse::class, $request);
    }

    /**
     * Updates an [EkmConnection][google.cloud.kms.v1.EkmConnection]'s metadata.
     *
     * Sample code:
     * ```
     * $ekmServiceClient = new EkmServiceClient();
     * try {
     *     $ekmConnection = new EkmConnection();
     *     $updateMask = new FieldMask();
     *     $response = $ekmServiceClient->updateEkmConnection($ekmConnection, $updateMask);
     * } finally {
     *     $ekmServiceClient->close();
     * }
     * ```
     *
     * @param EkmConnection $ekmConnection Required. [EkmConnection][google.cloud.kms.v1.EkmConnection] with updated
     *                                     values.
     * @param FieldMask     $updateMask    Required. List of fields to be updated in this request.
     * @param array         $optionalArgs  {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Kms\V1\EkmConnection
     *
     * @throws ApiException if the remote call fails
     */
    public function updateEkmConnection($ekmConnection, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateEkmConnectionRequest();
        $requestParamHeaders = [];
        $request->setEkmConnection($ekmConnection);
        $request->setUpdateMask($updateMask);
        $requestParamHeaders['ekm_connection.name'] = $ekmConnection->getName();
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('UpdateEkmConnection', EkmConnection::class, $optionalArgs, $request)->wait();
    }

    /**
     * Gets the access control policy for a resource. Returns an empty policy
    if the resource exists and does not have a policy set.
     *
     * Sample code:
     * ```
     * $ekmServiceClient = new EkmServiceClient();
     * try {
     *     $resource = 'resource';
     *     $response = $ekmServiceClient->getIamPolicy($resource);
     * } finally {
     *     $ekmServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being requested.
     *                             See the operation documentation for the appropriate value for this field.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type GetPolicyOptions $options
     *           OPTIONAL: A `GetPolicyOptions` object for specifying options to
     *           `GetIamPolicy`. This field is only used by Cloud IAM.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     */
    public function getIamPolicy($resource, array $optionalArgs = [])
    {
        $request = new GetIamPolicyRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $requestParamHeaders['resource'] = $resource;
        if (isset($optionalArgs['options'])) {
            $request->setOptions($optionalArgs['options']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetIamPolicy', Policy::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }

    /**
     * Sets the access control policy on the specified resource. Replaces
    any existing policy.

    Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and `PERMISSION_DENIED`
    errors.
     *
     * Sample code:
     * ```
     * $ekmServiceClient = new EkmServiceClient();
     * try {
     *     $resource = 'resource';
     *     $policy = new Policy();
     *     $response = $ekmServiceClient->setIamPolicy($resource, $policy);
     * } finally {
     *     $ekmServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being specified.
     *                             See the operation documentation for the appropriate value for this field.
     * @param Policy $policy       REQUIRED: The complete policy to be applied to the `resource`. The size of
     *                             the policy is limited to a few 10s of KB. An empty policy is a
     *                             valid policy but certain Cloud Platform services (such as Projects)
     *                             might reject them.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     */
    public function setIamPolicy($resource, $policy, array $optionalArgs = [])
    {
        $request = new SetIamPolicyRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $request->setPolicy($policy);
        $requestParamHeaders['resource'] = $resource;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('SetIamPolicy', Policy::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }

    /**
     * Returns permissions that a caller has on the specified resource. If the
    resource does not exist, this will return an empty set of
    permissions, not a `NOT_FOUND` error.

    Note: This operation is designed to be used for building
    permission-aware UIs and command-line tools, not for authorization
    checking. This operation may "fail open" without warning.
     *
     * Sample code:
     * ```
     * $ekmServiceClient = new EkmServiceClient();
     * try {
     *     $resource = 'resource';
     *     $permissions = [];
     *     $response = $ekmServiceClient->testIamPermissions($resource, $permissions);
     * } finally {
     *     $ekmServiceClient->close();
     * }
     * ```
     *
     * @param string   $resource     REQUIRED: The resource for which the policy detail is being requested.
     *                               See the operation documentation for the appropriate value for this field.
     * @param string[] $permissions  The set of permissions to check for the `resource`. Permissions with
     *                               wildcards (such as '*' or 'storage.*') are not allowed. For more
     *                               information see
     *                               [IAM Overview](https://cloud.google.com/iam/docs/overview#permissions).
     * @param array    $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\TestIamPermissionsResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function testIamPermissions($resource, $permissions, array $optionalArgs = [])
    {
        $request = new TestIamPermissionsRequest();
        $requestParamHeaders = [];
        $request->setResource($resource);
        $request->setPermissions($permissions);
        $requestParamHeaders['resource'] = $resource;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('TestIamPermissions', TestIamPermissionsResponse::class, $optionalArgs, $request, Call::UNARY_CALL, 'google.iam.v1.IAMPolicy')->wait();
    }
}

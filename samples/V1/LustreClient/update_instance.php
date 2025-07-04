<?php
/*
 * Copyright 2025 Google LLC
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
 * This file was automatically generated - do not edit!
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

// [START lustre_v1_generated_Lustre_UpdateInstance_sync]
use Google\ApiCore\ApiException;
use Google\ApiCore\OperationResponse;
use Google\Cloud\Lustre\V1\Client\LustreClient;
use Google\Cloud\Lustre\V1\Instance;
use Google\Cloud\Lustre\V1\UpdateInstanceRequest;
use Google\Rpc\Status;

/**
 * Updates the parameters of a single instance.
 *
 * @param string $instanceFilesystem               Immutable. The filesystem name for this instance. This name is
 *                                                 used by client-side tools, including when mounting the instance. Must be
 *                                                 eight characters or less and can only contain letters and numbers.
 * @param int    $instanceCapacityGib              The storage capacity of the instance in gibibytes (GiB). Allowed
 *                                                 values are from `18000` to `954000`, in increments of 9000.
 * @param string $formattedInstanceNetwork         Immutable. The full name of the VPC network to which the instance
 *                                                 is connected. Must be in the format
 *                                                 `projects/{project_id}/global/networks/{network_name}`. Please see
 *                                                 {@see LustreClient::networkName()} for help formatting this field.
 * @param int    $instancePerUnitStorageThroughput The throughput of the instance in MB/s/TiB.
 *                                                 Valid values are 125, 250, 500, 1000.
 */
function update_instance_sample(
    string $instanceFilesystem,
    int $instanceCapacityGib,
    string $formattedInstanceNetwork,
    int $instancePerUnitStorageThroughput
): void {
    // Create a client.
    $lustreClient = new LustreClient();

    // Prepare the request message.
    $instance = (new Instance())
        ->setFilesystem($instanceFilesystem)
        ->setCapacityGib($instanceCapacityGib)
        ->setNetwork($formattedInstanceNetwork)
        ->setPerUnitStorageThroughput($instancePerUnitStorageThroughput);
    $request = (new UpdateInstanceRequest())
        ->setInstance($instance);

    // Call the API and handle any network failures.
    try {
        /** @var OperationResponse $response */
        $response = $lustreClient->updateInstance($request);
        $response->pollUntilComplete();

        if ($response->operationSucceeded()) {
            /** @var Instance $result */
            $result = $response->getResult();
            printf('Operation successful with response data: %s' . PHP_EOL, $result->serializeToJsonString());
        } else {
            /** @var Status $error */
            $error = $response->getError();
            printf('Operation failed with error data: %s' . PHP_EOL, $error->serializeToJsonString());
        }
    } catch (ApiException $ex) {
        printf('Call failed with message: %s' . PHP_EOL, $ex->getMessage());
    }
}

/**
 * Helper to execute the sample.
 *
 * This sample has been automatically generated and should be regarded as a code
 * template only. It will require modifications to work:
 *  - It may require correct/in-range values for request initialization.
 *  - It may require specifying regional endpoints when creating the service client,
 *    please see the apiEndpoint client configuration option for more details.
 */
function callSample(): void
{
    $instanceFilesystem = '[FILESYSTEM]';
    $instanceCapacityGib = 0;
    $formattedInstanceNetwork = LustreClient::networkName('[PROJECT]', '[NETWORK]');
    $instancePerUnitStorageThroughput = 0;

    update_instance_sample(
        $instanceFilesystem,
        $instanceCapacityGib,
        $formattedInstanceNetwork,
        $instancePerUnitStorageThroughput
    );
}
// [END lustre_v1_generated_Lustre_UpdateInstance_sync]

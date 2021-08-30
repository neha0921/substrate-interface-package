<?php
declare(strict_types=1);


require __DIR__ . '/../vendor/autoload.php';

use neha0921\SubstrateInterfacePackage\SubstrateInterface;

// $obj = new SubstrateInterface("http://127.0.0.1:8000");
// echo $obj->rpc->rpc->methods();

/*Call selected method with input parameter  */
if(isset($_POST['method_name'])) {
    $methodName = $_POST['method_name'];
    $params = isset($_POST['params']) ? $_POST['params'] : [];
    $id = isset($_POST['id']) ? $_POST['id'] : 1;

    $obj = new SubstrateInterface("http://127.0.0.1:8000");

    switch ($methodName) {

        case 'rpc_methods':
            echo  $obj->rpc->rpc->methods();
            break;

        case 'system_chain':
            echo  $obj->rpc->system->chain();
            break;
        case 'system_chainType':
            echo  $obj->rpc->system->chainType();
            break;
        case 'system_health':
            echo  $obj->rpc->system->health();
            break;
        case 'system_localListenAddresses':
            echo  $obj->rpc->system->localListenAddresses();
            break;
        case 'system_localPeerId':
            echo  $obj->rpc->system->localPeerId();
            break;
        case 'system_name':
            echo  $obj->rpc->system->name();
            break;
        case 'system_nodeRoles':
            echo  $obj->rpc->system->nodeRoles();
            break;
        case 'system_peers':
            echo  $obj->rpc->system->peers();
            break;
        case 'system_properties':
            echo  $obj->rpc->system->properties();
            break;
        case 'system_reservedPeers':
            echo  $obj->rpc->system->reservedPeers();
            break;
        case 'system_syncState':
            echo  $obj->rpc->system->syncState();
            break;
        case 'system_version':
            echo  $obj->rpc->system->version();
            break;
        case 'state_call':
            echo  $obj->rpc->state->call();
            break;
        case 'state_getMetadata':
            echo  $obj->rpc->state->getMetadata();
            break;
        case 'state_getRuntimeVersion':
            echo  $obj->rpc->state->getRuntimeVersion();
            break;
        case 'state_subscribeRuntimeVersion':
            echo  $obj->rpc->state->subscribeRuntimeVersion();
            break;
        case 'state_subscribeStorage':
            echo  $obj->rpc->state->subscribeStorage();
            break;
        case 'state_unsubscribeRuntimeVersion':
            echo  $obj->rpc->state->unsubscribeRuntimeVersion();
            break;
        case 'state_unsubscribeStorage':
            echo  $obj->rpc->state->unsubscribeStorage();
            break;
        case 'state_getStorage':
            echo  $obj->rpc->state->getStorage($params);
            break;
        case 'state_getStorageHash':
            echo  $obj->rpc->state->getStorageHash($params);
            break;
        case 'state_getStorageSize':
            echo  $obj->rpc->state->getStorageSize($params);
            break;
        case 'state_queryStorage':
            echo  $obj->rpc->state->queryStorage($params);
            break;
        case 'subscribe_newHead':
            echo  $obj->rpc->rpc->subscribe_newHead();
            break;
        case 'unsubscribe_newHead':
            echo  $obj->rpc->rpc->unsubscribe_newHead();
            break;
        case 'author_pendingExtrinsics':
            echo  $obj->rpc->author->pendingExtrinsics();
            break;
        case 'author_submitExtrinsic':
            echo  $obj->rpc->author->submitExtrinsic($params);
            break;
        case 'chain_getBlock':
            echo  $obj->rpc->chain->getBlock();
            break;
        case 'chain_getBlockHash':
            echo  $obj->rpc->chain->getBlockHash();
            break;
        case 'chain_getFinalisedHead':
            echo  $obj->rpc->chain->getFinalisedHead();
            break;
        case 'chain_getFinalizedHead':
            echo  $obj->rpc->chain->getFinalizedHead();
            break;
        case 'chain_getHead':
            echo  $obj->rpc->chain->getHead();
            break;
        case 'chain_getHeader':
            echo  $obj->rpc->chain->getHeader();
            break;
        case 'chain_getRuntimeVersion':
            echo  $obj->rpc->chain->getRuntimeVersion();
            break;
        case 'chain_subscribeAllHeads':
            echo  $obj->rpc->chain->subscribeAllHeads();
            break;
        case 'chain_subscribeFinalisedHeads':
            echo  $obj->rpc->chain->subscribeFinalisedHeads();
            break;
        case 'chain_subscribeFinalizedHeads':
            echo  $obj->rpc->chain->subscribeFinalizedHeads();
            break;
        case 'chain_subscribeNewHead':
            echo  $obj->rpc->chain->subscribeNewHead();
            break;
        case 'chain_subscribeNewHeads':
            echo  $obj->rpc->chain->subscribeNewHeads();
            break;
        case 'grandpa_roundState':
            echo  $obj->rpc->grandpa->roundState();
            break;
        case 'grandpa_subscribeJustifications':
            echo  $obj->rpc->grandpa->subscribeJustifications();
            break;
        case 'keypair_create':
            echo  $obj->rpc->keypair->create($params);
            break;
        case 'keypair_inspect':
            echo  $obj->rpc->keypair->inspect($params);
            break;
        case 'keypair_sign':
            echo  $obj->rpc->keypair->sign($params);
            break;
        case 'keypair_verify':
            echo  $obj->rpc->keypair->verify($params);
            break;
        case 'runtime_getMetadata':
            echo  $obj->rpc->runtime->getMetadata($params);
            break;
        case 'runtime_getMetadataModules':
            echo  $obj->rpc->runtime->getMetadataModules($params);
            break;
        case 'runtime_getMetadataCallFunctions':
            echo  $obj->rpc->runtime->getMetadataCallFunctions($params);
            break;
        case 'runtime_getMetadataStorageFunctions':
            echo  $obj->rpc->runtime->getMetadataStorageFunctions($params);
            break;
        case 'runtime_getMetadataEvents':
            echo  $obj->rpc->runtime->getMetadataEvents($params);
            break;
        case 'runtime_getMetadataEvent':
            echo  $obj->rpc->runtime->getMetadataEvent($params);
            break;
        case 'runtime_getMetadataConstants':
            echo  $obj->rpc->runtime->getMetadataConstants($params);
            break;
        case 'runtime_getTypeRegistry':
            echo  $obj->rpc->runtime->getTypeRegistry();
            break;
        case 'runtime_getType':
            echo  $obj->rpc->runtime->getType($params);
            break;
        case 'runtime_setCustomTypes':
            echo  $obj->rpc->runtime->setCustomTypes($params);
            break;
        case 'runtime_addCustomType':
            echo  $obj->rpc->runtime->addCustomType($params);
            break;
        case 'runtime_removeCustomType':
            echo  $obj->rpc->runtime->removeCustomType($params);
            break;
        case 'runtime_getState':
            echo  $obj->rpc->runtime->getState($params);
            break;
        case 'runtime_getMetadataErrors':
            echo  $obj->rpc->runtime->getMetadataErrors($params);
            break;
        case 'runtime_getMetadataError':
            echo  $obj->rpc->runtime->getMetadataError($params);
            break;
        case 'runtime_decodeScale':
            echo  $obj->rpc->runtime->decodeScale($params);
            break;
        case 'runtime_encodeScale':
            echo  $obj->rpc->runtime->encodeScale($params);
            break;
       
    }
    
}

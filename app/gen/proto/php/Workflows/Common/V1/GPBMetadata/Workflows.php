<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: workflows/common/workflows.proto

namespace Workflows\Common\V1\GPBMetadata;

class Workflows
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
 workflows/common/workflows.protoworkflows.common.v1"�
WorkflowResult
id (	Rid
run_id (	RrunId9

started_at (2.google.protobuf.TimestampR	startedAt;
finished_at (2.google.protobuf.TimestampR
finishedAt
greeting (	RgreetingB�
com.workflows.common.v1BWorkflowsProtoP�WCX�Workflows.Common.V1�Workflows\\Common\\V1�Workflows\\Common\\V1\\GPBMetadata�Workflows::Common::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

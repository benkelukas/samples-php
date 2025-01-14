<?php

/**
 * This file is part of Temporal package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Temporal\Samples\SimpleActivity;

// @@@SNIPSTART php-hello-workflow-interface
use Temporal\Workflow\WorkflowInterface;
use Temporal\Workflow\WorkflowMethod;
use Workflows\Common\V1\WorkflowResult;

#[WorkflowInterface]
interface GreetingWorkflowInterface
{
    /**
     * @param string $name
     * @return WorkflowResult
     */
    #[WorkflowMethod(name: "SimpleActivity.greet")]
    public function greet(
        string $name
    );
}
// @@@SNIPEND

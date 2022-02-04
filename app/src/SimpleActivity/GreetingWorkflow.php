<?php

/**
 * This file is part of Temporal package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Temporal\Samples\SimpleActivity;

use Carbon\CarbonInterval;
use Temporal\Activity\ActivityOptions;
use Temporal\Workflow;
use Workflows\Common\V1\WorkflowResult;
use Google\Protobuf\Timestamp;


// @@@SNIPSTART php-hello-workflow
class GreetingWorkflow implements GreetingWorkflowInterface
{
    private $greetingActivity;

    public function __construct()
    {
        /**
         * Activity stub implements activity interface and proxies calls to it to Temporal activity
         * invocations. Because activities are reentrant, only a single stub can be used for multiple
         * activity invocations.
         */
        $this->greetingActivity = Workflow::newActivityStub(
            GreetingActivityInterface::class,
            ActivityOptions::new()->withStartToCloseTimeout(CarbonInterval::seconds(2))
        );
    }

    public function greet(string $name): \Generator
    {
        $start = Workflow::now();

        /**
         * @var WorkflowResult $previousGreeting
         */
        $previousGreeting = Workflow::getLastCompletionResult();

        if ( $previousGreeting !== null ) {
            $name .= "$name - last greeting was: {$previousGreeting->getGreeting()}, started at '{$previousGreeting->getStartedAt()}', completed at '{$previousGreeting->getFinishedAt()}'";
        }

        // This is a blocking call that returns only after the activity has completed.
        $greeting = yield $this->greetingActivity->composeGreeting("Hello", $name);

        $end = Workflow::now();

        return Workflow::async(
            function() use($start, $end, $greeting) {
                return (new WorkflowResult())
                    ->setRunId('1')
                    ->setId('1')
                    ->setStartedAt(
                        (new Timestamp())
                            ->setSeconds($start->getTimestamp())
                            ->setNanos(0)
                    )
                    ->setFinishedAt(
                        (new Timestamp())
                            ->setSeconds($end->getTimestamp())
                            ->setNanos(0)
                    )
                    ->setGreeting($greeting)
                ;
            }
        );
    }
}
// @@@SNIPEND

<?php
namespace extas\components\samples;

use extas\interfaces\samples\IHasSample;
use extas\interfaces\samples\ISample;
use extas\interfaces\samples\ISampleRepository;
use extas\interfaces\samples\ISampleService;

/**
 * Class SampleService
 *
 * @package extas\components\samples
 * @author jeyroik@gmail.com
 */
class SampleService implements ISampleService
{
    protected ISampleRepository $repo;

    /**
     * SampleService constructor.
     * @param ISampleRepository $sampleRepository
     */
    public function __construct(ISampleRepository $sampleRepository)
    {
        $this->repo = $sampleRepository;
    }

    /**
     * @param IHasSample $withSampleItem
     * @return ISample|null
     */
    public function getSample(IHasSample $withSampleItem): ?ISample
    {
        return $this->repo->one([ISample::FIELD__NAME => $withSampleItem->getSampleName()]);
    }
}

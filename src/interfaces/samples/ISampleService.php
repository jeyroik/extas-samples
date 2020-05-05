<?php
namespace extas\interfaces\samples;

/**
 * Interface ISampleService
 *
 * @package extas\interfaces\samples
 * @author jeyroik@gmail.com
 */
interface ISampleService
{
    /**
     * ISampleService constructor.
     * @param ISampleRepository $sampleRepository
     */
    public function __construct(ISampleRepository $sampleRepository);

    /**
     * @param IHasSample $withSampleItem
     * @return ISample|null
     */
    public function getSample(IHasSample $withSampleItem): ?ISample;
}

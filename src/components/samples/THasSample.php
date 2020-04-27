<?php
namespace extas\components\samples;

use extas\components\SystemContainer;
use extas\interfaces\samples\IHasSample;
use extas\interfaces\samples\ISample;
use extas\interfaces\samples\ISampleRepository;

/**
 * Trait THasSample
 *
 * @property $config
 *
 * @package extas\components\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasSample
{
    /**
     * @return string
     */
    public function getSampleName(): string
    {
        return $this->config[IHasSample::FIELD__SAMPLE_NAME] ?? '';
    }

    /**
     * @return ISample|null
     */
    public function getSample(): ?ISample
    {
        /**
         * @var $repo ISampleRepository
         */
        $repo = SystemContainer::getItem(ISampleRepository::class);

        return $repo->one([ISample::FIELD__NAME => $this->getSampleName()]);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function setSampleName(string $name)
    {
        $this->config[IHasSample::FIELD__SAMPLE_NAME] = $name;

        return $this;
    }

    /**
     * @param ISample $sample
     * @return $this
     */
    public function buildFromSample(ISample $sample)
    {
        $sampleData = $sample->__toArray();
        $sampleData[IHasSample::FIELD__SAMPLE_NAME] = $sample->getName();
        $this->config = $sampleData;

        return $this;
    }
}

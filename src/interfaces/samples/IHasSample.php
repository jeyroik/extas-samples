<?php
namespace extas\interfaces\samples;

/**
 * Interface IHasSample
 *
 * @package extas\interfaces\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasSample
{
    public const FIELD__SAMPLE_NAME = 'sample_name';

    /**
     * @return string
     */
    public function getSampleName(): string;

    /**
     * @return ISample|null
     */
    public function getSample(): ?ISample;

    /**
     * @param string $name
     * @return mixed
     */
    public function setSampleName(string $name);
}

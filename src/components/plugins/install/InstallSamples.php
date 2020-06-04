<?php
namespace extas\components\plugins\install;

use extas\components\samples\Sample;
use extas\interfaces\samples\ISampleRepository;

/**
 * Class PluginInstallSamples
 *
 * @package extas\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallSamples extends InstallSection
{
    protected string $selfName = 'sample';
    protected string $selfSection = 'samples';
    protected string $selfUID = Sample::FIELD__NAME;
    protected string $selfItemClass = Sample::class;
    protected string $selfRepositoryClass = 'sampleRepository';
}

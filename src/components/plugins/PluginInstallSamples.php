<?php
namespace extas\components\plugins;

use extas\components\samples\Sample;
use extas\interfaces\samples\ISampleRepository;

/**
 * Class PluginInstallSamples
 *
 * @package extas\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallSamples extends PluginInstallDefault
{
    protected $selfName = 'sample';
    protected $selfSection = 'samples';
    protected $selfUID = Sample::FIELD__NAME;
    protected $selfItemClass = Sample::class;
    protected $selfRepositoryClass = ISampleRepository::class;
}

<?php
namespace extas\components\samples;

use extas\components\repositories\Repository;
use extas\interfaces\samples\ISampleRepository;

/**
 * Class SampleRepository
 *
 * @package extas\components\samples
 * @author jeyroik@gmail.com
 */
class SampleRepository extends Repository implements ISampleRepository
{
    protected string $scope = 'extas';
    protected string $name = 'samples';
    protected string $pk = Sample::FIELD__NAME;
    protected string $idAs = '';
    protected string $itemClass = Sample::class;
}

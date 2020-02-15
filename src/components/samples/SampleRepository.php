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
    protected $scope = 'extas';
    protected $name = 'samples';
    protected $pk = Sample::FIELD__NAME;
    protected $idAs = '';
    protected $itemClass = Sample::class;
}

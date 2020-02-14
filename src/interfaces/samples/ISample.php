<?php
namespace extas\interfaces\samples;

use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IHasUpdatedAt;
use extas\interfaces\IItem;

/**
 * Interface ISample
 *
 * @package extas\interfaces\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ISample extends IItem, IHasName, IHasDescription, IHasCreatedAt, IHasUpdatedAt
{
    public const SUBJECT = 'extas.sample';
}

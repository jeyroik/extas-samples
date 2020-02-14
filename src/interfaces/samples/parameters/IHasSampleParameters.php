<?php
namespace extas\interfaces\samples\parameters;

/**
 * Interface IHasSampleParameters
 *
 * @package extas\interfaces\samples\parameters
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasSampleParameters
{
    /**
     * Parameters field name
     */
    public const FIELD__PARAMETERS = 'parameters';

    /**
     * @return \Generator <parameter.name>, <parameter>
     */
    public function eachParameter();

    /**
     * Return parameters list.
     *
     * @return ISampleParameter[] [<parameter.name> => <parameter>]
     */
    public function getParameters();

    /**
     * Return parameters values.
     *
     * @return array [<parameter.name> => <parameter.value>]
     */
    public function getParametersValues();

    /**
     * Return a parameter.
     *
     * @param string $parameterName
     * @return ISampleParameter|null
     */
    public function getParameter(string $parameterName): ?ISampleParameter;

    /**
     * Return a parameter value.
     *
     * @param string $parameterName
     * @return mixed
     */
    public function getParameterValue(string $parameterName);

    /**
     * Check if parameter with the name $parameterName is exist.
     *
     * @param string $parameterName
     * @return bool
     */
    public function hasParameter(string $parameterName): bool;

    /**
     * Rewrite parameters list.
     *
     * @param ISampleParameter[] $parameters
     * @return $this
     */
    public function setParameters(array $parameters);

    /**
     * Add parameters to a parameters list.
     * Skip parameter if it already exists.
     *
     * @param array $parameters
     * @return $this
     */
    public function addParameters(array $parameters);

    /**
     * Rewrite a parameter.
     * Add parameter if it doesn't exist.
     *
     * @param string $parameterName
     * @param array $options
     * @return $this
     */
    public function setParameter(string $parameterName, array $options);

    /**
     * @param string $parameterName
     * @param mixed $value
     * @return mixed
     */
    public function setParameterValue(string $parameterName, $value);

    /**
     * Update a parameter options.
     * Throw an error if parameter doesn't exist.
     *
     * @param string $parameterName
     * @param array $options
     * @return mixed
     * @throws \Exception
     */
    public function updateParameter(string $parameterName, array $options);
}

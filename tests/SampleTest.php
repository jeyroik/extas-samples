<?php
use PHPUnit\Framework\TestCase;
use extas\components\samples\Sample;
use extas\components\Item;
use extas\components\samples\THasSample;
use extas\interfaces\samples\IHasSample;
use extas\interfaces\samples\parameters\ISampleParameter;

/**
 * Class SampleTest
 *
 * @author jeyroik@gmail.com
 */
class SampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = \Dotenv\Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testParameters()
    {
        $sample = new Sample([
            Sample::FIELD__PARAMETERS => [
                'test1' => [
                    ISampleParameter::FIELD__NAME => 'test1',
                    ISampleParameter::FIELD__VALUE => 'test1-v'
                ],
                'test2' => [
                    ISampleParameter::FIELD__NAME => 'test2',
                    ISampleParameter::FIELD__VALUE => 'test2-v'
                ]
            ]
        ]);

        $this->assertTrue($sample->hasParameter('test1'));
        $this->assertCount(2, $sample->getParameters());

        foreach ($sample->eachParameter() as $parameterName => $parameter) {
            $this->assertTrue(in_array($parameterName, ['test1', 'test2']));
            $this->assertTrue($parameter instanceof ISampleParameter);
        }

        $values = $sample->getParametersValues();
        foreach ($values as $name => $value) {
            $this->assertTrue(in_array($name, ['test1', 'test2']));
            $this->assertTrue(in_array($value, ['test1-v', 'test2-v']));
        }

        $param = $sample->getParameter('test1');
        $this->assertNotEmpty($param);
        $this->assertEquals(['test1', 'test1-v'], [$param->getName(), $param->getValue()]);

        $nullParam = $sample->getParameter('unknown');
        $this->assertEmpty($nullParam);

        $paramOptions = $sample->getParameterOptions('test1');
        $this->assertTrue(is_array($paramOptions));
        $this->assertEquals('test1', $paramOptions[ISampleParameter::FIELD__NAME]);

        $this->assertEquals('test1-v', $sample->getParameterValue('test1'));

        $params = $sample->getParameters();
        foreach ($params as $index => $param) {
            $param->setName($param->getName() . '*');
            $params[$index] = $param;
        }
        $sample->setParameters($params);
        $this->assertFalse($sample->hasParameter('test1'));
        $sample->setParametersOptions([
            [
                ISampleParameter::FIELD__NAME => 'test1',
                ISampleParameter::FIELD__VALUE => 'test1-v'
            ],
            [
                ISampleParameter::FIELD__NAME => 'test1*',
                ISampleParameter::FIELD__VALUE => '*'
            ]
        ]);
        $this->assertEquals(
            [
                'test1' => 'test1-v',
                'test1*' => '*',
                'test2*' => 'test2-v'
            ],
            $sample->getParametersValues()
        );
        $sample->setParametersValues([
            'test1' => '1',
            'test1*' => '2'
        ]);
        $this->assertEquals(
            [
                'test1' => '1',
                'test1*' => '2',
                'test2*' => 'test2-v'
            ],
            $sample->getParametersValues()
        );

        $sample->setParameter('test1', [
            ISampleParameter::FIELD__NAME => 'test1',
            ISampleParameter::FIELD__VALUE => 'test1-v'
        ]);
        $this->assertEquals('test1-v', $sample->getParameterValue('test1'));
        $sample->setParameterValue('test1', '*');
        $this->assertEquals('*', $sample->getParameterValue('test1'));

        $sample->updateParameter('test1', [ISampleParameter::FIELD__VALUE => 'test1-v']);
        $this->assertEquals('test1-v', $sample->getParameterValue('test1'));

        $this->expectExceptionMessage('Unknown parameter "unknown"');
        $sample->getParameterOptions('unknown');
    }

    public function testSetValueUnknownParameter()
    {
        $sample = new Sample();
        $this->expectExceptionMessage('Unknown parameter "unknown"');
        $sample->setParameterValue('unknown', 'test');
    }

    public function testHasSample()
    {
        $hasSample = new class () extends Item implements IHasSample {
            use THasSample;

            protected function getSubjectForExtension(): string
            {
                return '';
            }
        };
        $hasSample->setSampleName('test');
        $this->assertEquals('test', $hasSample->getSampleName());
    }
}

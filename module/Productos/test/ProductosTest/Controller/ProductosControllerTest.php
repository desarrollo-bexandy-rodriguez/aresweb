<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/11/16
 * Time: 09:34 AM
 */

namespace ProductosTest\Controller;


use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ProductosControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp()
    {
            $this->setApplicationConfig(
            include '/var/www/ares-app/config/application.config.php'
        );
        parent::setUp();
    }

    protected function login($roles) {
        $userMock = $this->getMockBuilder('Application\Entity\User')
            ->disableOriginalConstructor()
            ->getMock();

        $userMock->expects($this->any())
            ->method('getRoles')->will($this->returnValue($roles));

        $storageMock = $this->getMock('\Zend\Authentication\Storage\NonPersistent');
        $storageMock->expects($this->any())
            ->method('isEmpty')->will($this->returnValue(false));
        $storageMock->expects($this->any())
            ->method('read')->will($this->returnValue($userMock));

        $sm = $this->getApplicationServiceLocator();
        $auth = $sm->get('Zend\Authentication\AuthenticationService');
        $auth->setStorage($storageMock);
    }

    public function testIndexActionCanBeAccessed()
    {
        $productoMapperMock = $this->getMockBuilder('Productos\Model\ProductoMapper')
                            ->disableOriginalConstructor()
                            ->getMock();

        $productoMapperMock->expects($this->once())
                    ->method('fetchAll')
                    ->will($this->returnValue(array()));

        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('ProductoMapper', $productoMapperMock);

        $this->login('administrador');
        $this->dispatch('/producto');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Productos');
        $this->assertControllerName('Productos\Controller\Producto');
        $this->assertControllerClass('ProductoController');
        $this->assertMatchedRouteName('producto');
    }
}

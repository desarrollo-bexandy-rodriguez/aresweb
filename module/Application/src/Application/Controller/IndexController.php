<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use BjyAuthorize\Exception\UnAuthorizedException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        /*
        *if (!$this->isAllowed('Inicio','acceder')) {
        *    throw new UnAuthorizedException();
        *}
         *
         */
        /*
        $query = "INSERT INTO `productos_x_pedido` (`id`,`pedido`, `producto`, `cantidad`, `subtotal`) VALUES ";
        $valores = "";
        $arrayprod = array(1,3,4,5,6,27,28,33,34,35,36,37,38,44,45,46,48,49,50,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,134,145,151,152,154,155,159,174,206,211,213,214,217,218,219,220,228,229,239,240,271,273,287,289,290,292,293,297,298,299,300,302,304,309,311,313,317,322,323,326,333,334,335,342,343,344,345,346,347,351,357,359,362,363,364,366,375,376,378,380,381,382,383,386,387,389,392,394,396,398,399,401,404,405,407,408,410,411,413,416,417,418,419,420,421,422,423,424,426,427,428,429,432,434,437,438,442,445,446,451,452,453,455,456,458,460,461,462,463,472,484,488,493,494,496,509,513,514,516,517,518,738,739,778,779,780,781,782,783,784,785,786,787,788,789,818,821,822,823,824,825,826,827,828,889,928,929,931,1013,1014,1015,1016,1024,1032,1035,1037,1038,1052,1053,1054,1184,1256,1257,1314,1315,1436,1445,1511,1546);
        for ($i=1;$i<200;$i++)
        {
            $pedido = rand(10,226);
            $indice = array_rand($arrayprod,1);
            $producto = $arrayprod[$indice];
            $cantidad = rand(1,20);
            $subtotal = rand(1000,60000);
            $valores = $valores . "(NULL, ".$pedido.", ".$producto.", ".$cantidad.", ".$subtotal."), ";
        }
        $consulta = $query . $valores;
        echo ($consulta);
        */
        return new ViewModel();
    }

    public function tiendaAction()
    {

        return new ViewModel();
    }

    public function adminAction()
    {

        return new ViewModel();
    }

}

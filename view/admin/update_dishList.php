<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include_once 'define.php';
            include APP_PATH . DS . 'classes' . DS . 'databases.php';
            include APP_PATH . DS . 'model' . DS . 'dish.php';
            include APP_PATH . DS . 'classes' . DS . 'util.php';
            
            $id = $_GET['id'];
            
            $model = new Model_Dish();
            $dishs = $model->getDishListById($id);
            
            if(count($_POST) > 0){
                $id = $_GET['id'];
                $name = $_POST['name'];
                $color = $_POST['color'];
                $weight = $_POST['weight'];
                $picture = Util::save_image('photo', 'data');

                $model->update($id, $name, $color, $weight, $picture);
            }
        ?>
        <?php
        $i = 0;
        foreach ($products as $product){
        ?>
                <h2>CHỈNH SỬA SẢN PHẨM</h2>
            <form method="post" enctype="multipart/form-data" action="">
                <table>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><input name="name" value="<?php echo $product->name;?>" /> </td>
                    </tr>
                    <tr>
                        <td>Màu sắc</td>
                        <td><input name="color" value="<?php echo $product->color;?>" /></td>
                    </tr>
                    <tr>
                        <td>Khối lượng (gam)</td>
                        <td><input name="weight" value="<?php echo $product->weight;?>" /> </td>
                    </tr>
                    <tr>
                        <td>Hình ảnh
                            <?php 
                            if ($product->picture !=''){
                                ?>
                                <img style="width: 200px;" src="<?php echo $product->picture;?>"/>
                                <?php
                            }
                            ?>
                            <input type="file" name="photo" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Lưu Dữ Liệu" /></td>
                    </tr>
                </table>
            </form>
        <?php
        }
        ?>
    </body>
</html>
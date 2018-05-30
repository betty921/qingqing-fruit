@echo off

 @set input1=""

:begin



E:\xampp\mysql\bin\mysql -uroot qingqing < qq_user.sql
echo 'qq_user.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_classification.sql
echo 'qq_classification.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_standard.sql
echo 'qq_standard.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_origin_place.sql
echo 'qq_origin_place.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_product.sql
echo 'qq_product.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_product_attr.sql
echo 'qq_product_attr.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_product_attr_value.sql
echo 'qq_product_attr_value.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_distribution.sql
echo 'qq_distribution.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_product_distribution_stock.sql
echo 'qq_product_distribution_stock.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_coupon.sql
echo 'qq_coupon.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_user_coupon.sql
echo 'qq_user_coupon.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_user_point_record.sql
echo 'qq_user_point_record.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_user_address.sql
echo 'qq_user.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_order.sql
echo 'qq_order.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_order_product.sql
echo 'qq_order_product.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_advertisement.sql
echo 'qq_advertisement.sql ok\n';

E:\xampp\mysql\bin\mysql -uroot qingqing < qq_shopping_cart.sql
echo 'qq_shopping_cart.sql ok\n';
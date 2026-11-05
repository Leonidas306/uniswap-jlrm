<?php
declare(strict_types=1);
function e(mixed $value):string{
    return htmlspecialchars((string)$value,ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');
}
function format_price(int $price_cents):string{
    return '$'.number_format($price_cents/100,2,'.',',').'MXN';
}
function categories():array{
    return['Libros','Tecnología','Accesorios','Hogar','Otros'];
}
function emoji_for(string $category):string{
    return match($category){
        'Libros'=>'📚','Tecnología'=>'💻','Accesorios'=>'🎧','Hogar'=>'🏠',default=>'❓'
    };
}

?>




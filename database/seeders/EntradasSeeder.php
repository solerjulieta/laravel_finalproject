<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entradas')->insert([
            [
                'entrada_id' => 1,
                'titulo' => 'El secreto para una pizza crocante y rica',
                'fecha_publicacion' => '2022-10-09',
                'intro' => 'Conocé el secreto para hacer la masa de la pizza bien crocante.',
                'sinopsis' => 'Nunca hay un día que no sea ideal para hornear pizzas caseras. ¿Sos de las personas, que les gusta la base bien crocante? El secreto está en el molde para pizzas con rejilla y revestimiento cerámico. La rejilla te asegura pisos crocantes siempre. A continuación te dejo una receta ideal para que pruebes hacerla.',
                'cuerpo' => 'Ingredientes: 255 g harina sin polvos de hornear, 5 g sal fina, 4 g levadura instantánea, 175 g agua tibia, 10g g aceite de oliva, 5 g azúcar blanca y por último, Sémola o polenta para la base. 
                            Elaboración: 
                            1.	Mezclar la harina, sal, azúcar y levadora en un bowl.
                            2.	Hacer un hoyo en el centro y poner el agua tibia y aceite de oliva. 
                            3.	Mezclar con una cuchara o espátula desde el centro agregando poco a poco la harina de los lados. 
                            4.	Cuando la cuchara ya no te ayude a mezclar usa tus manos para incorporar la masa. Al final vas a tener que poner todo sobre la mesa y mezclar un poco con tus manos, amasando un poco. 
                            5.	Si en este punto se pega a tus manos, agregamos de a poquito un poco de harina hasta que ya no se nos pegue. No agregarle de más porque si se seca mucho la masa no leuda tan fácilmente. 
                            6.	Amasarla por 30 minutos a mano o 15 min en batidora con el accesorio de gancho a velocidad máxima. 
                            7.	Ahora hay que dejarla leudar. Si queres hacer una pizza mediana entonces haz un bollito con la masa y la dejas sobre una bandeja o superficie limpia con un poquito de sémola o polenta abajo para que no se pegue. Encima le ponemos un paño húmedo para que la masa no se seque. 
                            8.	En los últimos 30min de leudado prende tu horno a la temperatura máxima que tenga disponible; broiler incluido. Si te da miedo o no sabes cuál es el máximo ponlo a 250C. Adentro del horno además deja tu sartén de hierro / piedra de pizza / bandeja de horno para que se caliente a la misma temperatura. Ponla muy cerca de la parte superior del horno.
                            9.	Una vez leudada estiramos la masa con nuestros dedos sobre una superficie con más sémola o polenta para que no se pegue. Primero presionas con tus dedos hacia abajo dejando un pequeño borde que no va a tener toppings. Luego la giras y repites. Para mayor referencia mira el video líneas arriba.
                            10.	Una vez estirada y delgada ponemos la salsa de tomate, el mozzarella y un chorrito de aceite de oliva. Si tienes una paleta grande para pizzas o incluso para levantar tortas puedes pasarla a tu sartén / piedra / bandeja de horno usándola con un poco de sémola encima para que resbale. Si no, que alguien te ayude para que puedas deslizar la pizza por el borde de tu mesa y adentro de donde la vas a cocinar. ¡Haz esto rápido! Si lo haces muy lento se va a partir.
                            11.	Metemos la pizza al horno nuevamente muy cerca a la parte superior. El tiempo de cocción va a variar según la temperatura de tu horno. Si es un horno de casa lo más probable es que necesite por lo menos 4 minutos y un máximo de 15min. ¡Así que tienes que estar muy pendiente!
                            12.	¡A disfrutarla!',
                'img' => 'pizza-crocante.jpg',
                'img_descripcion' => 'Pizza con masa bien crocante.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entrada_id' => 2,
                'titulo' => '6 herramientas básicas para comenzar el camino de la pastelería',
                'fecha_publicacion' => '2022-09-15',
                'intro' => 'Te proponemos 6 utensilios básicos de la pastelería y te contamos sus principales características para que despliegues tu creatividad en diferentes preparaciones.',
                'sinopsis' => 'Si tenes ganas de introducirte en el maravilloso mundo de la pastelería, hoy te vamos a contar cuáles son las herramientas básicas que no deberían faltar en un tu cocina y con las cuales vas a poder empezar a preparar muchas de tus recetas favoritas.',
                'cuerpo' => 'Moldes: Comenzamos por los moldes porque en este punto encontrarás una gran variedad de formas y tamaños, de diferentes materiales, de una sola pieza, por lo que es muy probable que no sepas por cual empezar. ¡No te preocupes, te vamos a ayudar! Para comenzar, te recomendamos tener uno rectangular, un molde desmontable alto para hacer cheesecake, por ejemplo. Otro desmontable, pero bajo para hacer tartas de bordes perfectos y sin renegar al desmoldarlas. Y para las cookies también te recomendamos tener una buena bandeja para el horno. Si querés lograr un acabado perfecto, te recomendamos las placas aireadas ya que su doble fondo les permite una mejor distribución del calor, y esto a su vez te brinda una opción más pareja. 
                            Espátulas: Las espátulas también van a ser grandes aliadas en tus preparaciones. Las vas a usar tanto en la preparación de mezclas como para hacer decoraciones rápidas y fáciles. Sirven para resaltar detalles y mejorar las definiciones. Un consejo que te será de mucha utilidad: es importante que inviertas en una espátula de buena calidad que resista altas temperaturas, sino corres el riesgo de que se deforme. 
                            Picos y acoples: Unos buenos picos son elementales para lograr decoraciones innovadoras y prolijas. A su vez, los acoples te van a ayudar a cambiar los picos con mayor facilidad mientras decoras. 
                            Colorantes: Existen distintos tipos de colorantes: en gel, líquidos, los hidrosolubles y también los liposolubles, especiales para trabajar con chocolate.
                            Base giratoria: Si vas a decorar, no puede faltarte este elemento que te va a permitir un trabajo cómodo y equilibrado, ya que facilita el manejo de los detalles. Además, implica menos esfuerzo y tu preparación quedará maravillosa. Hay de diferentes tipos, algunas básicas y otras más avanzadas que te permitirán ajustes más precisos. 
                            Cucharas y tazas medidoras: Recomendamos este conjunto de utensilios por diferentes motivos. Como sabrás, las medidas son muy importantes en la pastelería, y si no contás con una balanza, con un buen set de tazas y cucharas medidoras vas a poder suplir su función. 
                            De hecho, en muchos recetarios las medidas vienen en cucharas y tazas, lo que te va a permitir seguirlos muy fácilmente. Además, son elementos económicos que ocupan poco espacio en tu cocina.',
                'img' => 'utensilios-pasteleria.jpg',
                'img_descripcion' => 'Utensilios básicos para la pastelería.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entrada_id' => 3,
                'titulo' => 'Cómo hacer un gin tonic perfecto',
                'fecha_publicacion' => '2022-09-16',
                'intro' => 'El gin tonic es la bebida de moda hoy en día y te vamos a enseñar como prepararlo.',
                'sinopsis' => 'Es una bebida alcohólica suave y refrescante al mismo tiempo, por eso a la hora de ir a un bar el gin tonic se lleva todas las miradas. Es muy importante saber cómo servir un gin tonic para poder disfrutar del verdadero sabor de este cóctel.',
                'cuerpo' => '¿Qué necesitas?, necesitas de cinco ingredientes básicos: ginebra, hielo, tónica, algún cítrico (limón, lima, naranja, etc.), y un vaso con la capacidad suficiente para hacer la mezcla. 
                            El contenido importa, pero el contenedor también. Lo ideal para un gin tonic es servirlo en un vaso frío, preferentemente en una copa de balón, y si no tienes, un vaso de sidra puede ser otra opción, ya que son amplios y con las medidas se completará en su totalidad sin necesidad de añadir nada más. La copa tiene que tener suficiente capacidad como para que quepan todos los ingredientes de forma desahogada. 
                            El hielo debe ser grande y compacto. Su función es enfriar, no aguar el cóctel. Hay que poner suficiente para que la copa esté fría, pero no tanto como para dificultar el beber. Deben ser hielos grandes para que no se derritan fácilmente y nuestro trago quede aguado. 
                            El hielo no debe sobresalir por encima del vaso, entonces ¿Cuál es la cantidad de hielo correcta? Pondremos cuatro o cinco piezas y los removeremos para ayudar a enfriar un poco más nuestro vaso. 
                            Ginebra. Existen un montón de variedades de ginebras de diferentes sabores y aromas que van desde más dulce a más amargar o incluso con pequeños matices florales. 
                            La ginebra debe estar fría para retrasar que se derrita el hielo. Es la bebida que primero hay que poner en la copa, ya que en todos los cocteles siempre va primero la bebida de mayor graduación alcohólica. En este sentido y una vez elegida la que más te guste, es importante que cuando la sirvas no lo hagas pegando la botella al vaso. Para servir bien la ginebra necesitarás echarla desde una cierta altura. Con este pequeño detalle conseguiremos que permita oxigenarse y liberar sus aromas mientras rueda por los hielos.
                            Tónica. Al igual que ocurre con la ginebra, las tónicas tienen una gran variedad de sabores y cada una combina mejor con una ginebra que con otra. Sea cual sea la que elijas, cuando sirvas la tónica debes inclinar el vaso y deslizarla por el cristal para que no pierda sus burbujas. 
                            Cítrico. Elige el cítrico en función de la ginebra que hayas elegido, corta una rodaja, colócola dentro del vaso y con la piel del mismo puedes aromatizar el borde de la copa antes de servir el alcohol. Añadir un cítrico es perfecto para aromatizar cualquier gin tonic.
                            Ahora que tenes en claro todo lo que necesitás te dejamos las proporciones para prepararlo. Las proporciones correctas para elaborar un buen fin, son de 50 mililitros de ginebra y 200 mililitros de tónica. Con esas proporciones, el trago que vas a preparar tendrá unos 8 grados aproximadamente.',
                'img' => 'preparar-gin-tonic.jpg',
                'img_descripcion' => 'Gin tónic preparado en copa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

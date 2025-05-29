<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zapatos', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nombre', 100);           // Nombre del zapato
            $table->text('descripcion');             // Descripción del zapato
            $table->string('talla', 10);             // Talla (por ejemplo: "M", "9", etc.)
            $table->string('color', 50);             // Color principal
            $table->decimal('precio', 8, 2);         // Precio en formato decimal
            $table->integer('cantidad');             // Stock disponible
            $table->string('imagen', 255);           // Nombre o ruta del archivo de imagen
            $table->string('categoria', 50);         // Categoría o tipo de zapato
            $table->timestamps();                    // created_at y updated_at automáticos
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zapatos');
    }
};

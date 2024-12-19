use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('primeiro_nome');
            $table->string('ultimo_nome');
            $table->string('pais');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('authors');
    }
};

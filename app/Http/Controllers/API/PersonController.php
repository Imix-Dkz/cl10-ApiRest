<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PersonController extends Controller
{
    //C: función de crear/Create Persona
        public function create(Request $request){
            try { //Se manda solicitud de los siguientes datos...
                $data['name'] = $request['name'];
                $data['addres'] = $request['addres'];
                $data['phone'] = $request['phone'];
                //Ya con los cados se manda a crear registro
                $res = Person::create($data);
                return response()->json( $res, 200); //"200:Ok, Server Response"
            } catch (\Throwable $th) {
                //En caso de error, se responderá con el error 500, que es "ERROR INTERNO DEL SERVER"
                return response()->json(['error'=>$th->getMessage()], 500);
            }
        }
    //R: Se crea la función de GET/Read para obtención de datos...
        //Esta es una obtención de datos general...
        public function get(){
            try { //Se obtienen TODOS los registros
                $data = Person::get();
                //Se indica que se responderá con "200:Ok, Server Response"
                return response()->json($data, 200); 
            } catch (\Throwable $th) {
                //En caso de error, se responderá con el error "500:ERROR INTERNO DEL SERVER"
                return response()->json(['error'=>$th->getMessage()], 500);
            }
        }
        //Esta es una obtención de datos por ID...
        public function getById($id){
            try { //Se busca la información del Usuario con ese ID
                $data = Person::find($id);
                //Si hay datos, se entregarán en JSON "200:Ok, Server Response"
                return response()->json($data, 200); 
            } catch (\Throwable $th) {
                return response()->json(['error'=>$th->getMessage()], 500);
            }
        }
    //U: Función Update/Actualizar datos de un usuario...
        public function update(Request $request, $id)
        { //Ya que se neceista identificar que usuario es que se modificará, se requiere el ID
            try { //Se identificarán los datos que serán actualizados
                $data['name'] = $request['name'];
                $data['addres'] = $request['addres'];
                $data['phone'] = $request['phone'];
                //Ya con los cados se manda a buscar x ID y se actualiza
                $data = Person::find($id)->update($data);
                $res = Person::find($id);
                return response()->json( $res, 200); //"200:Ok, Server Response"
            } catch (\Throwable $th) {
                return response()->json(['error'=>$th->getMessage()], 500);
            }

        }
    //D: Función de eliminación/Delete de registro
        public function delete($id){
            try { //Se busca el registro y se indica que será eliminado
                $res = Person::find($id)->delete();
                return response()->json(["deleted"=>$res], 200); //"200:Ok, Server Response"
            } catch (\Throwable $th) {
                return response()->json(['error'=>$th->getMessage()], 500);
            }
        }

}

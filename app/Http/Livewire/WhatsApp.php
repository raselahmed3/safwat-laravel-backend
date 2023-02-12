<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\WhatsApp as WhatsAppNum;

class WhatsApp extends Component
{
    use WithPagination;
    public $phone_number;
    public $whatsapp_id;
    public $e_phone_number;
    public $modal = false;
    protected $rules = [
        'phone_number' => 'required|unique:whats_apps'
    ];
    public function render()
    {
        $numbers = WhatsAppNum::paginate(15);
        return view('livewire.whats-app',['numbers' => $numbers]);
    }

    public function formSubmit(){
        $this->validate();
        $whatsApp = new WhatsAppNum();
        $whatsApp->phone_number = $this->phone_number;
        $whatsApp->save();
        flash()->addSuccess('WhatsApp Number Save successfully');
        $this->phone_number = '';
    }

    public function modal($type = 'show'){
        if($type == 'close'){
            $this->modal  = false;
            $this->e_phone_number ='';
            $this->whatsapp_id = '';
        }else{
            $this->modal = true;
        }
    }

    public function edit($id){
        $whatsApp = WhatsAppNum::findOrFail($id);
        $this->e_phone_number = $whatsApp->phone_number;
        $this->whatsapp_id = $whatsApp->id;
        $this->modal();
    }

    public function update(){
        $this->validate([
            'e_phone_number' => 'required'
        ]);
        $whatsApp = WhatsAppNum::findOrFail($this->whatsapp_id);
        $whatsApp->phone_number = $this->e_phone_number;
        $whatsApp->save();

        flash()->addSuccess('Update Successfully');
        $this->modal('close');
    }

    public function delete($id){
        $whatsApp = WhatsAppNum::findOrFail($id);
        $whatsApp->delete();
        flash()->addSuccess('Delete Successfully');
    }



}

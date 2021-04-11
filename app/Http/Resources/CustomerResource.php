<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'quantity' => $this->quantity,
            'created_at' => $this->parseDate($this->created_at),
            'updated_at' => $this->parseDate($this->updated_at)
        ];
    }

    private function parseDate($date){
        $dateReturn  = Carbon::parse($date);
        $dateReturn->setTimezone('Asia/Bangkok');

        return $dateReturn->format("Y-m-d H:i");
    }
}

<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filter\ApiFilter;

class MovieFilter extends ApiFilter{
    protected $allowedParms = [
        'name' => ['eq'],
        'fileSize' => ['eq','gt','lt']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
    ];

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->allowedParms as $param => $operators){
            $query = $request->query($param);
            
            if(!isset($query))
                continue;

            foreach($operators as $operator){
                if (isset($query[$operator]))
                    $eloQuery[] = [$param, $this->operatorMap[$operator], $query[$operator]];
            }
        }
        return $eloQuery;   
    }
}


<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use Illuminate\Support\Arr;

class CustomValidatorServiceProvider extends Validator
{

    /**
     * Muestra el value de una validación unique;
     * @param  [type] $message    [description]
     * @param  [type] $attribute  [description]
     * @param  [type] $rule       [description]
     * @param  [type] $parameters [description]
     * @return [type]             [description]
     */
    protected function replaceUnique($message, $attribute, $rule, $parameters)
    {
        // parent class $data attribute contains all the validated values.
        $name = Arr::get($this->data, $attribute);
        return str_replace([':value'], [$name], $message);
    }

    /**
     * Muestra el value de una validación exists;
     * @param  [type] $message    [description]
     * @param  [type] $attribute  [description]
     * @param  [type] $rule       [description]
     * @param  [type] $parameters [description]
     * @return [type]             [description]
     */
    protected function replaceExists($message, $attribute, $rule, $parameters)
    {
        // parent class $data attribute contains all the validated values.
        $name = Arr::get($this->data, $attribute);
        return str_replace([':value'], [$name], $message);
    }

    /**
     * Muestra el value de una validación integer;
     * @param  [type] $message    [description]
     * @param  [type] $attribute  [description]
     * @param  [type] $rule       [description]
     * @param  [type] $parameters [description]
     * @return [type]             [description]
     */
    protected function replaceInteger($message, $attribute, $rule, $parameters)
    {
        // parent class $data attribute contains all the validated values.
        $name = Arr::get($this->data, $attribute);
        return str_replace([':value'], [$name], $message);
    }

    /**
     * Muestra el value de una validación numeric;
     * @param  [type] $message    [description]
     * @param  [type] $attribute  [description]
     * @param  [type] $rule       [description]
     * @param  [type] $parameters [description]
     * @return [type]             [description]
     */
    protected function replaceNumeric($message, $attribute, $rule, $parameters)
    {
        // parent class $data attribute contains all the validated values.
        $name = Arr::get($this->data, $attribute);
        return str_replace([':value'], [$name], $message);
    }

    /**
     * Valida que un atributo exista como vendedor de una compañía
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @return bool
     */
    protected function validateExistVendedorExternalCompany($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'exist_vendedor');

        list($connection, $table) = $this->parseTable($parameters[0]);

        $company_id = isset($parameters[1]) && $parameters[1] !== 'NULL'
                    ? $parameters[1] : '';
        //$table = 'user_details';
        return \DB::table($table)
            ->where($table.'.external_id', '=', $value)
            //Que exista relacion con users
            ->whereExists(function ($query)use($table) {
                $query->select(\DB::raw(1))
                    ->from('users')
                    ->whereRaw('users.id = '.$table.'.user_id');
            })
            //Que exista relacion users con user_sucursal
            ->whereExists(function ($query)use($table, $company_id) {
                $query->select(\DB::raw(1))
                    ->from('user_sucursal')
                    ->whereRaw('user_sucursal.user_id = '.$table.'.user_id')
                    //Que exista relación de user_sucursal con company_sucursales
                    ->whereExists(function ($qry)use($company_id) {
                        $qry->select(\DB::raw(1))
                            ->from('company_sucursales')
                            ->whereRaw('company_sucursales.id = user_sucursal.company_sucursal_id')
                            //Que exista relación company_sucursales con companies
                            ->whereExists(function ($q)use($company_id) {
                                $q->select(\DB::raw(1))
                                    ->from('companies')
                                    ->whereRaw('companies.id = company_sucursales.company_id')
                                    ->where('companies.id', '=', $company_id);
                            });
                    });

            })
            ->count()>0;
    }

    /**
     * Muestra el value de una validación exist_vendedor_company;
     * @param  [type] $message    [description]
     * @param  [type] $attribute  [description]
     * @param  [type] $rule       [description]
     * @param  [type] $parameters [description]
     * @return [type]             [description]
     */
    protected function replaceExistVendedorExternalCompany($message, $attribute, $rule, $parameters)
    {
        // parent class $data attribute contains all the validated values.
        $name = Arr::get($this->data, $attribute);
        return str_replace([':value'], [$name], $message);
    }

    /**
     * Valida que un atributo no exista como vendedor de una compañía
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @return bool
     */
    protected function validateNotExistVendedorExternalCompany($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'exist_vendedor');

        list($connection, $table) = $this->parseTable($parameters[0]);

        $company_id = isset($parameters[1]) && $parameters[1] !== 'NULL'
                    ? $parameters[1] : '';
        //$table = 'user_details';
        return \DB::table($table)
            ->where($table.'.external_id', '=', $value)
            //Que exista relacion con users
            ->whereExists(function ($query)use($table) {
                $query->select(\DB::raw(1))
                    ->from('users')
                    ->whereRaw('users.id = '.$table.'.user_id');
            })
            //Que exista relacion users con user_sucursal
            ->whereExists(function ($query)use($table, $company_id) {
                $query->select(\DB::raw(1))
                    ->from('user_sucursal')
                    ->whereRaw('user_sucursal.user_id = '.$table.'.user_id')
                    //Que exista relación de user_sucursal con company_sucursales
                    ->whereExists(function ($qry)use($company_id) {
                        $qry->select(\DB::raw(1))
                            ->from('company_sucursales')
                            ->whereRaw('company_sucursales.id = user_sucursal.company_sucursal_id')
                            //Que exista relación company_sucursales con companies
                            ->whereExists(function ($q)use($company_id) {
                                $q->select(\DB::raw(1))
                                    ->from('companies')
                                    ->whereRaw('companies.id = company_sucursales.company_id')
                                    ->where('companies.id', '=', $company_id);
                            });
                    });

            })
            ->count()<1;
    }

    /**
     * Muestra el value de una validación not_exist_vendedor_company;
     * @param  [type] $message    [description]
     * @param  [type] $attribute  [description]
     * @param  [type] $rule       [description]
     * @param  [type] $parameters [description]
     * @return [type]             [description]
     */
    protected function replaceNotExistVendedorExternalCompany($message, $attribute, $rule, $parameters)
    {
        // parent class $data attribute contains all the validated values.
        $name = Arr::get($this->data, $attribute);
        return str_replace([':value'], [$name], $message);
    }

}

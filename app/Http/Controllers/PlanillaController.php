<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanillaController extends Controller
{
    public function generar(Request $request)
    {
        $fechaCorte = Carbon::parse($request->fecha_corte);
        $empleados = Empleado::with(['puesto', 'subunidad'])->where('estado', 1)->get();
        $planilla = [];

        foreach ($empleados as $empleado) {
            $antiguedad = $fechaCorte->diffInYears(Carbon::parse($empleado->fechaingreso));
            $vacaciones = $antiguedad >= 1 ? round(($empleado->sueldo / 30) * 15) : 0;

            $isssEmp = min($empleado->sueldo * 0.03, 30);
            $afpEmp = $empleado->sueldo * 0.0725;
            $isssPat = min($empleado->sueldo * 0.075, 71.43);
            $afpPat = $empleado->sueldo * 0.0775;
            $isr = $this->calcularISR($empleado->sueldo);

            $neto = $empleado->sueldo + $vacaciones - $isssEmp - $afpEmp - $isr;
            $aportes = $isssEmp + $isssPat + $afpEmp + $afpPat;

            $planilla[] = [
                'empleado' => $empleado->primernombre . ' ' . $empleado->primerapellido,
                'codigo_empleado' => $empleado->numero_documento,
                'area' => optional($empleado->subunidad)->nombre,
                'puesto' => optional($empleado->puesto)->nombre,
                'fecha_ingreso' => $empleado->fechaingreso,
                'sueldo_base' => $empleado->sueldo,
                'vacaciones' => $vacaciones,
                'isss_empleado' => round($isssEmp, 2),
                'afp_empleado' => round($afpEmp, 2),
                'isr' => round($isr, 2),
                'isss_patronal' => round($isssPat, 2),
                'afp_patronal' => round($afpPat, 2),
                'neto_empleado' => round($neto, 2),
                'aportes_totales' => round($aportes, 2),
            ];
        }

        return response()->json($planilla);
    }

    private function calcularISR($sueldo)
    {
        if ($sueldo <= 472.00) return 0;
        if ($sueldo <= 895.24) return ($sueldo - 472.00) * 0.10 + 17.67;
        if ($sueldo <= 2038.10) return ($sueldo - 895.24) * 0.20 + 60.00;
        return ($sueldo - 2038.10) * 0.30 + 288.57;
    }
}

<?php

namespace App\Traits;

use App\Balance;
use App\DocumentDetail;
use App\Journal;
use App\Ledger;
use Illuminate\Http\Response;

trait MakeReport
{
    public function dailyReport($id, $description, $qty, $debit, $credit)
    {
        $currentSaldo = Balance::whereHas('document', function ($q) {
            return $q->myCompany();
        })->get()->sum(function ($q) {
            return $q['debit'] - $q['credit'];
        });

        Balance::create([
            'document_id' => $id,
            'description' => $description,
            'qty' => $qty,
            'debit' => $debit,
            'credit' => $credit,
            'balance' => $currentSaldo + ($debit - $credit),
        ]);
    }

    public function journal($document_id, $company_id, $account_id, $note, $ref, $debit = 0, $credit = 0)
    {
        Journal::create([
            'document_id' => $document_id,
            'company_id' => $company_id,
            'account_id' => $account_id,
            'note' => $note,
            'ref' => $ref,
            'debit' => $debit,
            'credit' => $credit,
        ]);
    }

    public function ledger($no, $document_id, $company_id, $account_id, $parent_id, $note, $ref, $debit = 0, $credit = 0)
    {
        if ($no == 0) {
            $currentSaldo = Ledger::myCompany()->whereAccountId($account_id)->get()->sum(function ($q) {
                return $q['debit'] - $q['credit'];
            });
            $currentSaldo += ($debit - $credit);
        } else {
            $currentSaldo = Ledger::myCompany()->whereAccountId($account_id)->get()->sum('credit');
            $currentSaldo += $credit;
        }

        Ledger::create([
            'document_id' => $document_id,
            'company_id' => $company_id,
            'account_id' => $account_id,
            'parent_id' => $parent_id,
            'note' => $note,
            'ref' => $ref,
            'debit' => $debit,
            'credit' => $credit,
            'balance' => $currentSaldo,
        ]);
    }

    public function revenue()
    {
        $akun2 = DocumentDetail::myCompany([2])->get()->groupBy('product_label');
        $akun3 = DocumentDetail::myCompany([3])->get()->groupBy('product_label');
        $akun4 = DocumentDetail::myCompany([4])->get()->groupBy('product_label');
        $total_pendapatan = DocumentDetail::myCompany([2, 3, 4])->get()->groupBy('product_label')->collapse()->sum('price');

        $akun5 = DocumentDetail::myCompany([5])->get()->groupBy('product_label');
        $akun6 = DocumentDetail::myCompany([6])->get()->groupBy('product_label');
        $akun7 = DocumentDetail::myCompany([7])->get()->groupBy('product_label');
        $akun8 = DocumentDetail::myCompany([8])->get()->groupBy('product_label');
        $akun9 = DocumentDetail::myCompany([9])->get()->groupBy('product_label');
        $akun10 = DocumentDetail::myCompany([10])->get()->groupBy('product_label');
        $akun11 = DocumentDetail::myCompany([11])->get()->groupBy('product_label');
        $akun12 = DocumentDetail::myCompany([12])->get()->groupBy('product_label');
        $akun13 = DocumentDetail::myCompany([13])->get()->groupBy('product_label');
        $total_biaya = DocumentDetail::myCompany([5, 6, 7, 8, 9, 10, 11, 12, 13])->get()->groupBy('product_label')->collapse()->sum('price');
        $total_labarugi = $total_pendapatan - $total_biaya;
        $total_labarugi2 = $total_labarugi - $akun12->collapse()->sum('price');
        $total_labarugi3 = $total_labarugi2 - $akun13->collapse()->sum('price');

        return $total_labarugi3;
    }

    public function revenue_pusat()
    {
        $akun2 = DocumentDetail::get()->groupBy('product_label');
        $akun3 = DocumentDetail::get()->groupBy('product_label');
        $akun4 = DocumentDetail::get()->groupBy('product_label');
        $total_pendapatan = DocumentDetail::get()->groupBy('product_label')->collapse()->sum('price');

        $akun5 = DocumentDetail::get()->groupBy('product_label');
        $akun6 = DocumentDetail::get()->groupBy('product_label');
        $akun7 = DocumentDetail::get()->groupBy('product_label');
        $akun8 = DocumentDetail::get()->groupBy('product_label');
        $akun9 = DocumentDetail::get()->groupBy('product_label');
        $akun10 = DocumentDetail::get()->groupBy('product_label');
        $akun11 = DocumentDetail::get()->groupBy('product_label');
        $akun12 = DocumentDetail::get()->groupBy('product_label');
        $akun13 = DocumentDetail::get()->groupBy('product_label');
        $total_biaya = DocumentDetail::get()->groupBy('product_label')->collapse()->sum('price');
        $total_labarugi = $total_pendapatan - $total_biaya;
        $total_labarugi2 = $total_labarugi - $akun12->collapse()->sum('price');
        $total_labarugi3 = $total_labarugi2 - $akun13->collapse()->sum('price');

        return 321948129;
    }
}

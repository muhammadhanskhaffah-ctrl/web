<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Menampilkan daftar goal.
     */
    public function index()
    {
        $goals = Goal::with('karyawan')
            ->latest()
            ->get();

        return view('goals.index', compact('goals'));
    }

    /**
     * Menampilkan form tambah goal.
     */
    public function create()
    {
        $karyawans = Karyawan::orderBy('nama')
            ->get();

        return view('goals.create', compact('karyawans'));
    }

    /**
     * Menyimpan goal baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'nama_goal' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'type' => 'required|string',
            'target' => 'required|numeric|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|string',
        ]);

        $goal = new Goal();

        $goal->karyawan_id = $request->karyawan_id;
        $goal->nama_goal = $request->nama_goal;
        $goal->deskripsi = $request->deskripsi;
        $goal->tipe = $request->type;
        $goal->target = $request->target;
        $goal->tanggal_mulai = $request->tanggal_mulai;
        $goal->tanggal_selesai = $request->tanggal_selesai;
        $goal->status = $request->status;

        $goal->save();

        return redirect()
            ->route('goals.index')
            ->with('success', 'Goal berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail goal.
     */
    public function show(Goal $goal)
    {
        $goal->load('karyawan');

        return view('goals.show', compact('goal'));
    }

    /**
     * Menampilkan form edit goal.
     */
    public function edit(Goal $goal)
    {
        $karyawans = Karyawan::orderBy('nama')
            ->get();

        return view('goals.edit', compact(
            'goal',
            'karyawans'
        ));
    }

    /**
     * Memperbarui goal.
     */
    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'nama_goal' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'type' => 'required|string',
            'target' => 'required|numeric|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|string',
        ]);

        $goal->karyawan_id = $request->karyawan_id;
        $goal->nama_goal = $request->nama_goal;
        $goal->deskripsi = $request->deskripsi;
        $goal->tipe = $request->type;
        $goal->target = $request->target;
        $goal->tanggal_mulai = $request->tanggal_mulai;
        $goal->tanggal_selesai = $request->tanggal_selesai;
        $goal->status = $request->status;

        $goal->save();

        return redirect()
            ->route('goals.index')
            ->with('success', 'Goal berhasil diperbarui.');
    }

    /**
     * Menghapus goal.
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()
            ->route('goals.index')
            ->with('success', 'Goal berhasil dihapus.');
    }
}
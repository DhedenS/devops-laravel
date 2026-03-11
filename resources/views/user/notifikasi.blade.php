@extends('layouts.app')
@section('content')

<style>
  body {
    background: linear-gradient(135deg, #d8f0d3 0%, #a2d88f 100%);
    font-family: 'Poppins', sans-serif;
  }

  .notification-wrapper {
    max-width: 900px;
    margin: 70px auto;
    padding: 0 25px 50px;
  }

  .notification-header {
    font-weight: 700;
    font-size: 2.2rem;
    color: #1b3e20;
    text-align: center;
    margin-bottom: 40px;
    letter-spacing: 1.2px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
  }

  .notification-item {
    background: white;
    border-radius: 16px;
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.12);
    padding: 22px 28px;
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 25px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
  }

  .notification-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
  }

  .notif-icon {
    background: #4caf50;
    padding: 14px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px #4caf5077;
  }

  .notif-icon svg {
    width: 28px;
    height: 28px;
    fill: white;
  }

  .notif-content {
    flex: 1;
  }

  .notif-title {
    font-weight: 700;
    font-size: 1.3rem;
    color: #2a5125;
    margin-bottom: 4px;
  }

  .notif-message {
    font-size: 1.05rem;
    color: #4a4a4a;
    line-height: 1.4;
  }

  .notif-time {
    font-size: 0.85rem;
    color: #6c7a63;
    margin-top: 10px;
  }

  /* Badge status */
  .notif-badge {
    position: absolute;
    right: 24px;
    top: 20px;
    padding: 6px 14px;
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 9999px;
    color: white;
    text-transform: uppercase;
    user-select: none;
  }

  .notif-badge.disetujui {
    background: #388e3c;
    box-shadow: 0 0 8px #388e3caa;
  }

  .notif-badge.ditolak {
    background: #d32f2f;
    box-shadow: 0 0 8px #d32f2faa;
  }

  /* No notification style */
  .no-notif {
    text-align: center;
    color: #2a3a1a;
    margin-top: 100px;
    font-size: 1.2rem;
    font-weight: 600;
  }

  .no-notif img {
    margin-bottom: 20px;
    filter: drop-shadow(0 0 4px rgba(0,0,0,0.1));
  }
</style>

<div class="notification-wrapper">
  <div class="notification-header">Notifikasi Terbaru</div>

  @php
    auth()->user()->unreadNotifications->markAsRead();
  @endphp

  @forelse(auth()->user()->notifications as $notification)
    <div class="notification-item">
      <div class="notif-icon" aria-hidden="true">
        <!-- SVG Padi Icon -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
          <path d="M12 2C9 6 7 10 7 14C7 17 9 20 12 22C15 20 17 17 17 14C17 10 15 6 12 2Z" fill="currentColor"/>
          <path d="M12 2C14 6 16 10 16 14C16 17 14 20 12 22C10 20 8 17 8 14C8 10 10 6 12 2Z" fill="#81c784"/>
        </svg>
      </div>

      <div class="notif-content">
        <div class="notif-title">{{ $notification->data['title'] }}</div>
        <div class="notif-message">{{ $notification->data['message'] }}</div>
        <div class="notif-time">{{ $notification->created_at->diffForHumans() }}</div>
      </div>

      {{-- Badge status jika ada --}}
      @if(isset($notification->data['status']))
        <div class="notif-badge {{ $notification->data['status'] }}">
          {{ strtoupper($notification->data['status']) }}
        </div>
      @endif
    </div>
  @empty
    <div class="no-notif">
      <img src="{{ asset('assets/images/empty.png') }}" alt="Tidak ada notifikasi" width="180" />
      <p>Belum ada notifikasi, semangat terus ya! 🌱</p>
    </div>
  @endforelse
</div>
@endsection

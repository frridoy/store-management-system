@extends('admin.layouts.app')
@section('content')

<div class="page-wrapper">
            <div class="content">
                <!-- Dashboard Stats -->
                <div class="dashboard-stats fade-in-up">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div>
                                <div class="stat-value">$45,230</div>
                                <div class="stat-label">Total Revenue</div>
                            </div>
                            <div class="stat-icon">💰</div>
                        </div>
                        <div class="stat-change positive">
                            ↗️ +12.5% from last month
                        </div>
                    </div>

                    <div class="stat-card success">
                        <div class="stat-header">
                            <div>
                                <div class="stat-value">1,234</div>
                                <div class="stat-label">Total Orders</div>
                            </div>
                            <div class="stat-icon success">🛒</div>
                        </div>
                        <div class="stat-change positive">
                            ↗️ +8.2% from last month
                        </div>
                    </div>

                    <div class="stat-card warning">
                        <div class="stat-header">
                            <div>
                                <div class="stat-value">856</div>
                                <div class="stat-label">Total Products</div>
                            </div>
                            <div class="stat-icon warning">📦</div>
                        </div>
                        <div class="stat-change negative">
                            ↘️ -2.1% from last month
                        </div>
                    </div>

                    <div class="stat-card info">
                        <div class="stat-header">
                            <div>
                                <div class="stat-value">432</div>
                                <div class="stat-label">Active Customers</div>
                            </div>
                            <div class="stat-icon info">👥</div>
                        </div>
                        <div class="stat-change positive">
                            ↗️ +15.3% from last month
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts-section">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Sales Overview</h3>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                        <div class="chart-placeholder">
                            📈 Sales Chart Will Be Here
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Top Categories</h3>
                        </div>
                        <div class="chart-placeholder">
                            🥧 Pie Chart Will Be Here
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="recent-activity">
                    <div class="activity-header">
                        <h3 class="chart-title">Recent Activity</h3>
                        <a href="#" class="btn btn-primary">View All</a>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">📦</div>
                        <div class="activity-content">
                            <div class="activity-title">New product added: iPhone 15 Pro</div>
                            <div class="activity-time">2 minutes ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">🛒</div>
                        <div class="activity-content">
                            <div class="activity-title">Order #1234 completed</div>
                            <div class="activity-time">5 minutes ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">👤</div>
                        <div class="activity-content">
                            <div class="activity-title">New customer registered: John Smith</div>
                            <div class="activity-time">1 hour ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">💰</div>
                        <div class="activity-content">
                            <div class="activity-title">Payment received: $1,250.00</div>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            {{-- <footer class="footer">
                <p>&copy; 2025 Store Management System. All rights reserved. | Powered by Modern Web Technologies</p>
            </footer> --}}
        </div>
@endsection

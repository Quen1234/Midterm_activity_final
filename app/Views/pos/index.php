<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<style>
    :root {
        --pos-primary: #4361ee;
        --pos-secondary: #3f37c9;
        --pos-accent: #4cc9f0;
        --pos-success: #4895ef;
        --pos-bg: #f8f9fe;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        --hover-shadow: 0 15px 35px rgba(67, 97, 238, 0.15);
    }

    .pos-container {
        animation: fadeIn 0.6s ease-out;
    }

    /* Product Card Enhancements */
    .product-card {
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.03) !important;
        background: #ffffff;
        position: relative;
        z-index: 1;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--hover-shadow) !important;
        border-color: var(--pos-primary) !important;
    }

    .product-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        opacity: 0;
        box-shadow: var(--hover-shadow);
        transition: opacity 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        z-index: -1;
    }

    .product-card:hover::after {
        opacity: 1;
    }

    .icon-box {
        width: 64px;
        height: 64px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1.25rem;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #f0f3ff 0%, #e0e7ff 100%);
        color: var(--pos-primary);
    }

    .product-card:hover .icon-box {
        background: linear-gradient(135deg, var(--pos-primary) 0%, var(--pos-secondary) 100%);
        color: white;
        transform: scale(1.1) rotate(5deg);
    }

    /* Search Bar Styling */
    .search-wrapper {
        position: relative;
        transition: all 0.3s ease;
    }

    .search-wrapper:focus-within {
        transform: scale(1.02);
    }

    #productSearch {
        padding-left: 3rem;
        height: 50px;
        border-radius: 15px;
        font-size: 1rem;
        border: 2px solid transparent;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        transition: all 0.3s ease;
    }

    #productSearch:focus {
        border-color: var(--pos-primary);
        box-shadow: 0 4px 20px rgba(67, 97, 238, 0.1);
        background: white !important;
    }

    .search-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        z-index: 10;
        transition: all 0.3s ease;
    }

    #productSearch:focus + .search-icon {
        color: var(--pos-primary);
    }

    /* Cart Section Enhancements */
    .cart-card {
        background: white;
        border-radius: 24px !important;
        overflow: hidden;
        border: none !important;
        box-shadow: var(--card-shadow) !important;
    }

    .cart-header {
        background: linear-gradient(to right, #ffffff, #f8f9fe);
        border-bottom: 1px solid #f1f5f9 !important;
    }

    .cart-items {
        height: calc(100vh - 450px) !important;
        min-height: 350px;
    }

    .cart-item-row {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .cart-item-row:hover {
        background-color: #f8faff;
        border-left-color: var(--pos-primary);
    }

    .qty-control {
        background: #f1f5f9;
        border-radius: 10px;
        padding: 4px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-qty {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: all 0.2s;
        color: var(--pos-primary);
    }

    .btn-qty:hover {
        background: var(--pos-primary);
        color: white;
    }

    /* Checkout Button */
    .btn-checkout {
        background: linear-gradient(135deg, var(--pos-primary) 0%, var(--pos-secondary) 100%);
        border: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .btn-checkout::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
        z-index: -1;
    }

    .btn-checkout:hover::before {
        left: 100%;
    }

    .btn-checkout:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
    }

    /* Marquee Animation for long text */
    .moving-text-container {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
    }

    .moving-text-container:hover .moving-text {
        display: inline-block;
        animation: marquee-scroll 8s linear infinite;
        text-overflow: clip;
        overflow: visible;
        width: auto;
    }

    @keyframes marquee-scroll {
        0% { transform: translateX(0); }
        50% { transform: translateX(-20%); } /* Gentle scroll */
        100% { transform: translateX(0); }
    }

    .text-truncate {
        max-width: 150px;
    }

    /* Badge Stock */
    .stock-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.75rem;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInRight {
        from { transform: translateX(30px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    .item-added {
        animation: pulse 0.4s ease-in-out;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
</style>

<div class="container-fluid pos-container">
    <div class="row g-4">
        <!-- Products Section -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4" style="background: transparent;">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-shopping-bag me-2 text-primary"></i>Marketplace
                    </h4>
                    <div class="d-flex align-items-center gap-3 flex-grow-1 justify-content-end">
                        <div class="search-wrapper flex-grow-1" style="max-width: 400px;">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" id="productSearch" class="form-control bg-white border-0" placeholder="Search products...">
                        </div>
                        <button class="btn btn-primary rounded-4 px-4 py-2 fw-bold shadow-sm" onclick="showCustomItemModal()">
                            <i class="fas fa-plus-circle me-2"></i>Custom Item
                        </button>
                    </div>
                </div>

                <div class="row g-4" id="productList">
                    <?php if(!empty($products)): ?>
                        <?php foreach($products as $product): ?>
                            <div class="col-xl-4 col-md-6 product-item" data-name="<?= strtolower($product['item_name']) ?>" data-barcode="<?= $product['barcode'] ?>">
                                <div class="card h-100 product-card rounded-4" onclick="addToCart(<?= $product['id'] ?>, '<?= addslashes($product['item_name']) ?>', <?= $product['price'] ?>)">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center gap-3 mb-3">
                                            <div class="icon-box mb-0 flex-shrink-0">
                                                <?php 
                                                    $catName = strtolower($product['category'] ?? '');
                                                    $iconClass = $categoryIcons[$catName] ?? 'fas fa-box';
                                                ?>
                                                <i class="<?= esc($iconClass) ?>"></i>
                                            </div>
                                            <div class="text-start overflow-hidden flex-grow-1">
                                                <div class="moving-text-container">
                                                    <h5 class="fw-bold mb-1 text-dark text-truncate moving-text"><?= $product['item_name'] ?></h5>
                                                </div>
                                                <div class="moving-text-container">
                                                    <span class="badge bg-light text-muted rounded-pill px-3 moving-text"><?= $product['category'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                            <div class="text-start">
                                                <small class="text-muted d-block">Price</small>
                                                <span class="h5 fw-bold text-primary mb-0">₱<?= number_format($product['price'], 2) ?></span>
                                            </div>
                                            <div class="text-end">
                                                <span class="stock-badge <?= $product['stock'] > 10 ? 'bg-soft-green text-success' : 'bg-soft-red text-danger' ?>">
                                                    <?= $product['stock'] ?> in stock
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <div class="bg-white rounded-4 p-5 shadow-sm">
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="Empty" style="width: 120px; opacity: 0.5;">
                                <h5 class="mt-4 text-muted">No products found in inventory.</h5>
                                <a href="<?= base_url('inventory/add') ?>" class="btn btn-primary mt-3 px-4 rounded-pill">
                                    <i class="fas fa-plus me-2"></i>Add First Product
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Cart Section -->
        <div class="col-lg-4">
            <div class="card cart-card h-100">
                <div class="card-header cart-header py-4 px-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold text-dark">Current Order</h5>
                        <small class="text-muted" id="itemCount">0 items in cart</small>
                    </div>
                    <button class="btn btn-light rounded-circle shadow-sm text-danger" onclick="clearCart()" title="Clear Cart">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="cart-items" style="overflow-y: auto;">
                        <table class="table align-middle mb-0">
                            <tbody id="cartTableBody">
                                <!-- Cart items will be added here -->
                                <tr id="emptyCartRow">
                                    <td colspan="3" class="text-center py-5">
                                        <div class="py-4">
                                            <i class="fas fa-shopping-cart fa-3x text-light mb-3"></i>
                                            <p class="text-muted">Your cart is empty</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 shadow-lg">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-bold text-dark" id="subtotal">₱0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <h4 class="fw-bold mb-0">Total Amount</h4>
                        <h4 class="fw-bold mb-0 text-primary" id="total">₱0.00</h4>
                    </div>
                    <button class="btn btn-checkout w-100 py-3 rounded-4 fw-bold shadow-sm text-white h5 mb-0" onclick="showCheckoutModal()">
                        <i class="fas fa-check-circle me-2"></i> COMPLETE ORDER
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="checkoutModalLabel">Complete Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold text-uppercase">Total Amount</label>
                    <h2 class="fw-bold text-primary mb-0" id="modalTotal">₱0.00</h2>
                </div>

                <div class="mb-3">
                    <label for="customerName" class="form-label fw-bold">Customer Name</label>
                    <input type="text" class="form-control rounded-3" id="customerName" placeholder="Enter customer name">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Payment Method</label>
                    <div class="row g-2">
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="payCash" value="cash" checked onchange="togglePartialInput()">
                            <label class="btn btn-outline-primary w-100 py-2 rounded-3" for="payCash">
                                <i class="fas fa-money-bill-wave d-block mb-1"></i> Cash
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="payGcash" value="gcash" onchange="togglePartialInput()">
                            <label class="btn btn-outline-primary w-100 py-2 rounded-3" for="payGcash">
                                <i class="fas fa-mobile-alt d-block mb-1"></i> GCash
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="payPartial" value="partial" onchange="togglePartialInput()">
                            <label class="btn btn-outline-primary w-100 py-2 rounded-3" for="payPartial">
                                <i class="fas fa-hand-holding-usd d-block mb-1"></i> Partial
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="payUtang" value="utang" onchange="togglePartialInput()">
                            <label class="btn btn-outline-primary w-100 py-2 rounded-3" for="payUtang">
                                <i class="fas fa-file-invoice-dollar d-block mb-1"></i> Utang
                            </label>
                        </div>
                    </div>
                </div>

                <div id="partialPaymentSection" style="display: none;" class="mb-4">
                    <label for="amountPaid" class="form-label fw-bold">Amount Paid</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">₱</span>
                        <input type="number" class="form-control border-start-0" id="amountPaid" placeholder="0.00" step="0.01">
                    </div>
                </div>

                <div id="cashPaymentSection" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="amountTendered" class="form-label fw-bold">Amount Tendered</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0">₱</span>
                                <input type="number" class="form-control border-start-0" id="amountTendered" placeholder="0.00" step="0.01" oninput="calculateChange()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Change</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0">₱</span>
                                <input type="text" class="form-control border-start-0 bg-white" id="changeAmount" placeholder="0.00" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0 p-4">
                <button type="button" class="btn btn-light py-2 px-4 rounded-3 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary py-2 px-4 rounded-3 fw-bold" onclick="processCheckout()">Confirm Payment</button>
            </div>
        </div>
    </div>
</div>

<!-- Custom Item Modal -->
    <div class="modal fade" id="customItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 ps-4">
                    <h5 class="modal-title fw-bold text-dark">Add Custom Item</h5>
                    <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="customItemName" class="form-label fw-bold text-muted small text-uppercase">Item Name</label>
                        <input type="text" class="form-control rounded-3 border-light bg-light" id="customItemName" placeholder="Enter item name...">
                    </div>
                    <div class="mb-3">
                        <label for="customItemPrice" class="form-label fw-bold text-muted small text-uppercase">Price</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-light rounded-start-3">₱</span>
                            <input type="number" class="form-control rounded-end-3 border-light bg-light" id="customItemPrice" placeholder="0.00" step="0.01">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="customItemCategory" class="form-label fw-bold text-muted small text-uppercase">Category</label>
                        <select class="form-select rounded-3 border-light bg-light" id="customItemCategory">
                            <option value="">Select Category (Optional)</option>
                            <?php if(!empty($categories)): ?>
                                <?php foreach($categories as $cat): ?>
                                    <option value="<?= esc($cat['name']) ?>"><?= esc($cat['name']) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="saveToInventory">
                            <label class="form-check-label fw-bold text-muted small text-uppercase" for="saveToInventory">
                                <i class="fas fa-save me-1"></i> Save to Inventory Permanently
                            </label>
                        </div>
                        <small class="text-muted">If enabled, this item will be added to your inventory for future use.</small>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm" onclick="addCustomItem()">
                        <i class="fas fa-plus-circle me-2"></i>Add to Order
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Receipt Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-body p-0">
                <div class="receipt-container bg-white p-4" id="printableReceipt">
                    <div class="text-center mb-4">
                        <h5 class="fw-bold mb-0">NANAY LIVY'S STORE</h5>
                        <small class="text-muted">VALID RECEIPT</small>
                        <hr class="my-3 border-dashed">
                    </div>
                    
                    <div id="receiptItems">
                        <!-- Items will be injected here -->
                    </div>

                    <hr class="my-3 border-dashed">
                    
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted small">Subtotal</span>
                        <span class="fw-bold" id="receiptSubtotal">₱0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="fw-bold mb-0">TOTAL</h5>
                        <h5 class="fw-bold mb-0 text-primary" id="receiptTotal">₱0.00</h5>
                    </div>

                    <div id="receiptPaymentDetails" class="bg-light p-2 rounded-3 small mb-4">
                        <!-- Payment details will be injected here -->
                    </div>

                    <div class="text-center">
                        <small class="text-muted">Thank you for shopping!</small><br>
                        <small class="text-muted" id="receiptDate"></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 p-3 bg-light">
                <button type="button" class="btn btn-secondary w-100 rounded-3 fw-bold" onclick="window.print()">
                    <i class="fas fa-print me-2"></i> Print Receipt
                </button>
                <button type="button" class="btn btn-primary w-100 rounded-3 fw-bold" data-bs-dismiss="modal" onclick="location.reload()">
                    Done
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .border-dashed {
        border-top: 1px dashed #dee2e6;
    }
    @media print {
        @page {
            size: 74mm auto;
            margin: 0;
        }
        
        /* Hide all UI elements */
        .sidebar, .top-navbar, footer, .modal-backdrop, .btn, .alert, .nav-header, .sidebar-brand, 
        [id^="debug-icon"], [id^="debug-bar"], .debug-bar {
            display: none !important;
        }

        /* Reset main containers to be transparent/white and sized for 1/8 A4 */
        html, body, .main-wrapper, .page-content {
            margin: 0 !important;
            padding: 0 !important;
            background: white !important;
            width: 74mm !important;
            height: auto !important;
            min-height: auto !important;
            display: block !important;
            overflow: visible !important;
        }

        /* Hide all other page content except the active modal */
        .page-content > *:not(#receiptModal) {
            display: none !important;
        }

        /* Receipt Modal Printing - Force it to show exactly like the on-screen receipt */
        #receiptModal {
            display: block !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 74mm !important;
            margin: 0 !important;
            padding: 0 !important;
            opacity: 1 !important;
            visibility: visible !important;
            border: none !important;
            background: white !important;
        }

        .modal-dialog, .modal-content, .modal-body {
            margin: 0 !important;
            padding: 0 !important;
            width: 74mm !important;
            border: none !important;
            box-shadow: none !important;
            background: white !important;
            display: block !important;
        }

        .modal-header, .modal-footer, .btn-close {
            display: none !important;
        }

        #printableReceipt {
            display: block !important;
            width: 74mm !important;
            padding: 5mm !important;
            box-sizing: border-box !important;
            background: white !important;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif !important;
        }

        /* Match specific styles from the receipt for accuracy */
        #printableReceipt * {
            opacity: 1 !important;
            visibility: visible !important;
        }
        
        .text-danger { color: #dc3545 !important; }
        .text-success { color: #198754 !important; }
        .text-primary { color: #0d6efd !important; }
        .fw-bold { font-weight: bold !important; }
        .border-top { border-top: 1px solid #dee2e6 !important; }
        .border-dashed { border-top: 1px dashed #dee2e6 !important; }
        
        /* Ensure logo/header looks identical */
        h5 { 
            font-size: 1.1rem !important; 
            margin-bottom: 0.25rem !important;
            text-align: center !important;
        }
        .small { font-size: 0.85rem !important; }
    }
</style>

<script>
    let cart = [];
    
    // Lazy initialize modals to ensure Bootstrap is loaded
    function getCheckoutModal() {
        return bootstrap.Modal.getOrCreateInstance(document.getElementById('checkoutModal'));
    }
    
    function getReceiptModal() {
        return bootstrap.Modal.getOrCreateInstance(document.getElementById('receiptModal'));
    }

    function getCustomItemModal() {
        return bootstrap.Modal.getOrCreateInstance(document.getElementById('customItemModal'));
    }

    function showCustomItemModal() {
        document.getElementById('customItemName').value = '';
        document.getElementById('customItemPrice').value = '';
        document.getElementById('customItemCategory').value = '';
        getCustomItemModal().show();
    }

    function addCustomItem() {
        const name = document.getElementById('customItemName').value.trim();
        const price = parseFloat(document.getElementById('customItemPrice').value);
        const category = document.getElementById('customItemCategory').value;
        const saveToInventory = document.getElementById('saveToInventory').checked;

        if (!name) {
            alert('Please enter an item name.');
            return;
        }
        if (isNaN(price) || price <= 0) {
            alert('Please enter a valid price.');
            return;
        }

        // Use a unique negative timestamp as ID for custom items
        const id = -Math.floor(Date.now());
        addToCart(id, name, price, category, saveToInventory);
        getCustomItemModal().hide();
        
        // Reset checkbox for next use
        document.getElementById('saveToInventory').checked = false;
    }

    function addToCart(id, name, price, category = '', saveToInventory = false) {
        const existingItem = cart.find(item => item.id === id);
        if (existingItem) {
            existingItem.qty += 1;
        } else {
            cart.push({ id, name, price, qty: 1, category, saveToInventory });
        }
        renderCart();
        
        // Add visual feedback
        const cards = document.querySelectorAll('.product-card');
        cards.forEach(card => {
            if(card.innerText.includes(name)) {
                card.classList.add('item-added');
                setTimeout(() => card.classList.remove('item-added'), 400);
            }
        });
    }

    function updateQty(id, delta) {
        const item = cart.find(item => item.id === id);
        if (item) {
            item.qty += delta;
            if (item.qty <= 0) {
                cart = cart.filter(i => i.id !== id);
            }
            renderCart();
        }
    }

    function clearCart() {
        if(cart.length > 0 && confirm('Are you sure you want to clear the cart?')) {
            cart = [];
            renderCart();
        }
    }

    function renderCart() {
        const tbody = document.getElementById('cartTableBody');
        const itemCount = document.getElementById('itemCount');
        
        let totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        itemCount.innerText = `${totalItems} ${totalItems === 1 ? 'item' : 'items'} in cart`;

        if (cart.length === 0) {
            tbody.innerHTML = `
                <tr id="emptyCartRow">
                    <td colspan="3" class="text-center py-5">
                        <div class="py-4">
                            <i class="fas fa-shopping-cart fa-3x text-light mb-3"></i>
                            <p class="text-muted">Your cart is empty</p>
                        </div>
                    </td>
                </tr>
            `;
            document.getElementById('subtotal').innerText = '₱0.00';
            document.getElementById('total').innerText = '₱0.00';
            return;
        }

        tbody.innerHTML = '';
        let total = 0;

        cart.forEach(item => {
            const rowTotal = item.price * item.qty;
            total += rowTotal;
            
            const tr = document.createElement('tr');
            tr.className = 'cart-item-row';
            tr.innerHTML = `
                <td class="ps-4 py-3">
                    <div class="fw-bold text-dark mb-0">${item.name}</div>
                    <div class="d-flex align-items-center gap-2">
                        <small class="text-primary fw-semibold">₱${item.price.toFixed(2)}</small>
                        ${item.category ? `<span class="badge bg-light text-muted rounded-pill border-0" style="font-size: 0.65rem;">${item.category}</span>` : ''}
                    </div>
                </td>
                <td class="text-center">
                    <div class="qty-control shadow-sm">
                        <button class="btn-qty" onclick="updateQty(${item.id}, -1)"><i class="fas fa-minus small"></i></button>
                        <span class="fw-bold mx-1" style="min-width: 20px;">${item.qty}</span>
                        <button class="btn-qty" onclick="updateQty(${item.id}, 1)"><i class="fas fa-plus small"></i></button>
                    </div>
                </td>
                <td class="text-end pe-4 fw-bold text-dark">₱${rowTotal.toFixed(2)}</td>
            `;
            tbody.appendChild(tr);
        });

        const formattedTotal = '₱' + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
        document.getElementById('subtotal').innerText = formattedTotal;
        document.getElementById('total').innerText = formattedTotal;
        document.getElementById('modalTotal').innerText = formattedTotal;
    }

    function showCheckoutModal() {
        if (cart.length === 0) {
            alert('Your cart is empty! Please add some items before checking out.');
            return;
        }
        getCheckoutModal().show();
    }

    function togglePartialInput() {
        const method = document.querySelector('input[name="paymentMethod"]:checked').value;
        const partialSection = document.getElementById('partialPaymentSection');
        const cashSection = document.getElementById('cashPaymentSection');
        
        if (method === 'partial') {
            partialSection.style.display = 'block';
            cashSection.style.display = 'none';
        } else if (method === 'cash') {
            partialSection.style.display = 'none';
            cashSection.style.display = 'block';
            calculateChange();
        } else {
            partialSection.style.display = 'none';
            cashSection.style.display = 'none';
        }
    }

    function calculateChange() {
        const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        const tendered = parseFloat(document.getElementById('amountTendered').value) || 0;
        const change = tendered - total;
        
        const changeInput = document.getElementById('changeAmount');
        if (tendered > 0) {
            changeInput.value = change >= 0 ? change.toFixed(2) : 'Insufficient';
            changeInput.classList.toggle('text-danger', change < 0);
        } else {
            changeInput.value = '0.00';
            changeInput.classList.remove('text-danger');
        }
    }

    function processCheckout() {
        const customerName = document.getElementById('customerName').value;
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
        const amountPaid = document.getElementById('amountPaid').value;
        const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

        if ((paymentMethod === 'partial' || paymentMethod === 'utang') && !customerName) {
            alert('Customer name is required for Partial or Utang payments.');
            return;
        }

        if (paymentMethod === 'partial' && (!amountPaid || amountPaid <= 0)) {
            alert('Please enter a valid amount paid.');
            return;
        }

        if (paymentMethod === 'cash') {
            const tendered = parseFloat(document.getElementById('amountTendered').value) || 0;
            if (tendered < total) {
                alert('Amount tendered is insufficient.');
                return;
            }
        }

        // Prepare data for backend
        const checkoutData = {
            customer_name: customerName || 'Guest',
            payment_method: paymentMethod,
            amount_paid: amountPaid || total,
            total_amount: total,
            amount_tendered: paymentMethod === 'cash' ? document.getElementById('amountTendered').value : null,
            change_amount: paymentMethod === 'cash' ? document.getElementById('changeAmount').value : null,
            items: cart.map(item => ({
                id: item.id,
                name: item.name,
                qty: item.qty,
                price: item.price,
                category: item.category || '',
                saveToInventory: item.saveToInventory || false
            }))
        };

        // Send to backend
        fetch('<?= base_url('pos/checkout') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(checkoutData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showReceipt(checkoutData, data.transaction_id);
                getCheckoutModal().hide();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing the transaction.');
        });
    }

    function showReceipt(data, transactionId) {
        const receiptItems = document.getElementById('receiptItems');
        receiptItems.innerHTML = '';
        
        data.items.forEach(item => {
            const div = document.createElement('div');
            div.className = 'd-flex justify-content-between mb-1 small';
            div.innerHTML = `
                <span>${item.qty}x ${item.name}</span>
                <span>₱${(item.qty * item.price).toFixed(2)}</span>
            `;
            receiptItems.appendChild(div);
        });

        document.getElementById('receiptSubtotal').innerText = '₱' + data.total_amount.toFixed(2);
        document.getElementById('receiptTotal').innerText = '₱' + data.total_amount.toFixed(2);
        
        const details = document.getElementById('receiptPaymentDetails');
        let detailsHtml = `<div class="d-flex justify-content-between"><span>Method:</span><span class="fw-bold text-uppercase">${data.payment_method}</span></div>`;
        detailsHtml += `<div class="d-flex justify-content-between"><span>Customer:</span><span class="fw-bold">${data.customer_name}</span></div>`;
        
        if (data.payment_method === 'partial') {
            detailsHtml += `<div class="d-flex justify-content-between"><span>Paid:</span><span class="fw-bold">₱${parseFloat(data.amount_paid).toFixed(2)}</span></div>`;
            detailsHtml += `<div class="d-flex justify-content-between"><span>Balance:</span><span class="fw-bold text-danger">₱${(data.total_amount - data.amount_paid).toFixed(2)}</span></div>`;
        } else if (data.payment_method === 'cash') {
            if (data.amount_tendered) {
                detailsHtml += `<div class="d-flex justify-content-between"><span>Tendered:</span><span class="fw-bold">₱${parseFloat(data.amount_tendered).toFixed(2)}</span></div>`;
                detailsHtml += `<div class="d-flex justify-content-between"><span>Change:</span><span class="fw-bold">₱${parseFloat(data.change_amount).toFixed(2)}</span></div>`;
            }
        } else if (data.payment_method === 'utang') {
            detailsHtml += `<div class="d-flex justify-content-between"><span>Status:</span><span class="fw-bold text-danger">UNPAID</span></div>`;
        }
        
        details.innerHTML = detailsHtml;
        document.getElementById('receiptDate').innerText = new Date().toLocaleString();
        
        getReceiptModal().show();
    }

    // Search functionality
    document.getElementById('productSearch').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        const items = document.querySelectorAll('.product-item');
        let found = false;

        items.forEach(item => {
            const name = item.getAttribute('data-name');
            const barcode = item.getAttribute('data-barcode') || '';
            if (name.includes(term) || barcode === term) {
                item.style.display = 'block';
                found = true;
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Barcode Scanner Integration
    let barcodeBuffer = '';
    let lastKeyTime = Date.now();

    document.addEventListener('keydown', function(e) {
        // Barcode scanners usually fire keys very quickly
        const currentTime = Date.now();
        if (currentTime - lastKeyTime > 100) {
            barcodeBuffer = ''; // Reset if too slow (likely manual typing)
        }
        lastKeyTime = currentTime;

        // Ignore modifier keys
        if (e.key === 'Shift' || e.key === 'Control' || e.key === 'Alt') return;

        if (e.key === 'Enter') {
            if (barcodeBuffer.length > 3) {
                findAndAddByBarcode(barcodeBuffer);
                barcodeBuffer = '';
                e.preventDefault();
            }
        } else {
            // Append single character keys
            if (e.key.length === 1) {
                barcodeBuffer += e.key;
            }
        }
    });

    function findAndAddByBarcode(barcode) {
        const items = document.querySelectorAll('.product-item');
        let found = false;
        
        items.forEach(item => {
            const itemBarcode = item.getAttribute('data-barcode');
            if (itemBarcode === barcode) {
                // Trigger the click event on the product card
                item.querySelector('.product-card').click();
                found = true;
                
                // Show a toast or some feedback
                console.log('Barcode Scanned: ' + barcode);
            }
        });

        if (!found) {
            console.log('Barcode not found: ' + barcode);
        }
    }
</script>
<?= $this->endSection() ?>

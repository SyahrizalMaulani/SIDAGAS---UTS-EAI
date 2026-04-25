const express = require('express');
const cors = require('cors');
const { createProxyMiddleware } = require('http-proxy-middleware');

const app = express();
const PORT = 8005;

app.use(cors());

// Proxy ke Customer Service (FastAPI)
app.use('/customers', createProxyMiddleware({
    target: 'http://127.0.0.1:8001',
    changeOrigin: true
}));

// Proxy ke Product Service (FastAPI)
app.use('/products', createProxyMiddleware({
    target: 'http://127.0.0.1:8002',
    changeOrigin: true
}));

// Proxy ke Order Service (FastAPI)
app.use('/orders', createProxyMiddleware({
    target: 'http://127.0.0.1:8003',
    changeOrigin: true
}));

app.get('/', (req, res) => {
    res.send('API Gateway Node.js berjalan. Gunakan endpoint /customers, /products, atau /orders');
});

app.listen(PORT, () => {
    console.log(`API Gateway berjalan di http://localhost:${PORT}`);
});

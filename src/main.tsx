import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import 'animate.css'
import { RouterProvider } from 'react-router-dom'
import router from '../routes/router'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'


const queryClient = new QueryClient()

createRoot(document.getElementById('root')!).render(
  <QueryClientProvider client={queryClient}>
    <StrictMode>
      <RouterProvider router={router} />
    </StrictMode>
  </QueryClientProvider>
)

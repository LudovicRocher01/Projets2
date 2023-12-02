package com.example.tp_rocherludovic

import android.app.Application
import com.example.tp_rocherludovic.models.ContactList
import com.example.tp_rocherludovic.viewmodels.MailViewModel
import com.example.tp_rocherludovic.viewmodels.ApiViewModel
import org.koin.android.ext.koin.androidContext
import org.koin.android.ext.koin.androidLogger
import org.koin.androidx.viewmodel.dsl.viewModel
import org.koin.core.context.startKoin
import org.koin.dsl.module
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

class MainApplication : Application() {
    private val AppModule = module {

        single {
            ContactList()
        }

        viewModel<MailViewModel> {
            MailViewModel(get())
        }

        single<RetrofitService> {
            val retrofit = Retrofit.Builder()
                .baseUrl("https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/global-shark-attack/")
                .addConverterFactory(GsonConverterFactory.create())
                .build()
            retrofit.create(RetrofitService::class.java)
        }
        viewModel<ApiViewModel> {
            ApiViewModel(get())
        }
    }

    override fun onCreate() {
        super.onCreate()

        startKoin()
        {
            androidLogger()
            androidContext(this@MainApplication)
            modules(AppModule)
        }
    }
}

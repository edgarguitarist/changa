package com.chang.sistemalecto_escritura.ui.calificaciones;

import androidx.lifecycle.LiveData;
import androidx.lifecycle.MutableLiveData;
import androidx.lifecycle.ViewModel;

public class CalificacionViewModel extends ViewModel {

    private MutableLiveData<String> mText;

    public CalificacionViewModel() {
        mText = new MutableLiveData<>();
        mText.setValue("This is gallery fragment");
    }

    public LiveData<String> getText() {
        return mText;
    }
}
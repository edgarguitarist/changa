package com.chang.sistemalecto_escritura.ui.salir;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProvider;

import com.chang.sistemalecto_escritura.Login;
import com.chang.sistemalecto_escritura.databinding.FragmentSalirBinding;

public class SalirFragment extends Fragment {

    private SalirViewModel salirViewModel;
    private FragmentSalirBinding binding;

    public View onCreateView(@NonNull LayoutInflater inflater,
            ViewGroup container, Bundle savedInstanceState) {
        salirViewModel =
                new ViewModelProvider(this).get(SalirViewModel.class);

        binding = FragmentSalirBinding.inflate(inflater, container, false);
        View root = binding.getRoot();

        startActivity(new Intent(getActivity(), Login.class));
        /*SharedPreferences preferences = getActivity().getSharedPreferences("datos", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = preferences.edit();
        editor.putString("correo","");
        editor.commit();
        getActivity().finish();*/
        return root;
    }
}
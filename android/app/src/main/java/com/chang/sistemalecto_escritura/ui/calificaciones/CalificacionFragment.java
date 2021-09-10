package com.chang.sistemalecto_escritura.ui.calificaciones;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProvider;

import com.chang.sistemalecto_escritura.R;
import com.chang.sistemalecto_escritura.conexion;
import com.chang.sistemalecto_escritura.databinding.FragmentCalificacionBinding;

public class CalificacionFragment extends Fragment {

    private CalificacionViewModel calificacionViewModel;
    private FragmentCalificacionBinding binding;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        WebView webView;

        calificacionViewModel =
                new ViewModelProvider(this).get(CalificacionViewModel.class);

        binding = FragmentCalificacionBinding.inflate(inflater, container, false);
        View root = binding.getRoot();

        final ProgressDialog progressDialog = new ProgressDialog(getContext());
        progressDialog.setIcon(R.drawable.calificacion);
        progressDialog.setMessage("Cargando sus Notas por favor espere...");
        progressDialog.show();

        //SharedPreferences preferences = getSharedPreferences("datos", Context.MODE_PRIVATE);
        String dir = conexion.URL_WEB_SERVICES + "test_table.php";//preferences.getString("direccion","");
        // Toast.makeText(this, dir, Toast.LENGTH_LONG).show(); // DEBUG
        webView = binding.webViewCalificacion;
        webView.setWebViewClient(new WebViewClient());
        webView.getSettings().setJavaScriptEnabled(true);
        webView.getSettings().setDisplayZoomControls(false);
        webView.setInitialScale(100);
        webView.loadUrl(dir);
        webView.setWebViewClient(new WebViewClient(){
            @Override
            public void onPageFinished(WebView view, String url) {
                super.onPageFinished(view, url);
                //elimina ProgressBar.
                progressDialog.dismiss();
            }
        });

        return root;
    }



    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }
}
﻿using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Newtonsoft.Json;

namespace ProgettoRistorante {
    public partial class Form1 : Form {
        private bool mouseDown = false;
        private Point lastLocation;
        HttpWebRequest richiestaApi;

        public Form1() {
            InitializeComponent();
            aggiornaPietanze();
        }

        private void closeBtn_Click(object sender, EventArgs e) {
            this.Close();
        }

        private void panel1_MouseMove(object sender, MouseEventArgs e) {
            if (mouseDown) {
                this.Location = new Point((this.Location.X - lastLocation.X) + e.X, (this.Location.Y - lastLocation.Y) + e.Y);
                this.Update();
            }
        }

        private void panel1_MouseUp(object sender, MouseEventArgs e) {
            mouseDown = false;
        }

        private void panel1_MouseDown(object sender, MouseEventArgs e) {
            mouseDown = true;
            lastLocation = e.Location;
        }

        private void label2_Click(object sender, EventArgs e) {

        }

        private void label3_Click(object sender, EventArgs e) {

        }

        private void listaOrdinazioni_MouseUp(object sender, MouseEventArgs e) {
            
        }

        public void aggiornaPietanze() {
            listaOrdinazioni.Controls.Clear();

            richiestaApi = (HttpWebRequest)WebRequest.Create(string.Format("http://localhost/sitoRistorante/api/cucina/getOrdinazioni.php"));
            richiestaApi.Method = "GET";

            HttpWebResponse rispostaApi = (HttpWebResponse)richiestaApi.GetResponse();

            string json;
            using (Stream stream = rispostaApi.GetResponseStream()) {
                StreamReader reader = new StreamReader(stream, Encoding.UTF8);
                json = reader.ReadToEnd();
            }

            if(!json.Contains("Nessuna ordinazione")) {
                List<PietanzaOrdinata> pietanze = JsonConvert.DeserializeObject<List<PietanzaOrdinata>>(json);
                foreach (PietanzaOrdinata pietanza in pietanze) {
                    if (listaOrdinazioni.Controls.Count == 0) {
                        Ordine ordine = new Ordine(this);
                        ordine.numTavoloLabel.Text = "Tav: " + pietanza.idTavolo;
                        ordine.listaPietanze.Text = pietanza.nomePietanza + " - " + pietanza.quantita + "\n";
                        ordine.orderId = pietanza.idOrdinazione;
                        listaOrdinazioni.Controls.Add(ordine);
                    } else {
                        bool inserito = false;
                        foreach (Ordine ord in listaOrdinazioni.Controls) {
                            if (ord.numTavoloLabel.Text == "Tav: " + pietanza.idTavolo) {
                                ord.listaPietanze.Text += pietanza.nomePietanza + " - " + pietanza.quantita + "\n";
                                ord.orderId = pietanza.idOrdinazione;
                                inserito = true;
                            }
                        }

                        if (!inserito) {
                            Ordine ordine = new Ordine(this);
                            ordine.numTavoloLabel.Text = "Tav: " + pietanza.idTavolo;
                            ordine.listaPietanze.Text = pietanza.nomePietanza + " - " + pietanza.quantita + "\n";
                            ordine.orderId = pietanza.idOrdinazione;
                            listaOrdinazioni.Controls.Add(ordine);
                        }
                    }
                }
            }            
        }

        private void updateBtn_Click(object sender, EventArgs e) {
            aggiornaPietanze();
        }
    }
}

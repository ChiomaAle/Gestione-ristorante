﻿using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Threading;
using System.Windows.Forms;

namespace ProgettoRistorante {
    internal class Ordine : UserControl{
        private Panel pannello;
        public string orderId;
        private Button completatoBtn;
        public Label numTavoloLabel;
        public RichTextBox listaPietanze;
        Form1 ic;
        public Ordine(Form1 ic) {
            this.ic = ic;
            InitializeComponent();
        }

        private void InitializeComponent() {
            this.pannello = new System.Windows.Forms.Panel();
            this.listaPietanze = new System.Windows.Forms.RichTextBox();
            this.numTavoloLabel = new System.Windows.Forms.Label();
            this.completatoBtn = new System.Windows.Forms.Button();
            this.pannello.SuspendLayout();
            this.SuspendLayout();
            // 
            // pannello
            // 
            this.pannello.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(22)))), ((int)(((byte)(38)))), ((int)(((byte)(46)))));
            this.pannello.Controls.Add(this.listaPietanze);
            this.pannello.Controls.Add(this.numTavoloLabel);
            this.pannello.Controls.Add(this.completatoBtn);
            this.pannello.Location = new System.Drawing.Point(0, 0);
            this.pannello.Name = "pannello";
            this.pannello.Size = new System.Drawing.Size(250, 550);
            this.pannello.TabIndex = 0;
            // 
            // listaPietanze
            // 
            this.listaPietanze.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(22)))), ((int)(((byte)(38)))), ((int)(((byte)(46)))));
            this.listaPietanze.Font = new System.Drawing.Font("Arial", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.listaPietanze.ForeColor = System.Drawing.Color.White;
            this.listaPietanze.Location = new System.Drawing.Point(3, 51);
            this.listaPietanze.Name = "listaPietanze";
            this.listaPietanze.ReadOnly = true;
            this.listaPietanze.Size = new System.Drawing.Size(244, 457);
            this.listaPietanze.TabIndex = 2;
            this.listaPietanze.Text = "Pizza margherita - 2";
            // 
            // numTavoloLabel
            // 
            this.numTavoloLabel.AutoSize = true;
            this.numTavoloLabel.Font = new System.Drawing.Font("Arial", 26.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numTavoloLabel.ForeColor = System.Drawing.Color.White;
            this.numTavoloLabel.Location = new System.Drawing.Point(75, 8);
            this.numTavoloLabel.Name = "numTavoloLabel";
            this.numTavoloLabel.Size = new System.Drawing.Size(108, 40);
            this.numTavoloLabel.TabIndex = 1;
            this.numTavoloLabel.Text = "Tav: 1";
            // 
            // completatoBtn
            // 
            this.completatoBtn.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(60)))), ((int)(((byte)(122)))), ((int)(((byte)(137)))));
            this.completatoBtn.FlatAppearance.BorderSize = 0;
            this.completatoBtn.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.completatoBtn.Location = new System.Drawing.Point(69, 514);
            this.completatoBtn.Name = "completatoBtn";
            this.completatoBtn.Size = new System.Drawing.Size(114, 23);
            this.completatoBtn.TabIndex = 0;
            this.completatoBtn.Text = "Completato";
            this.completatoBtn.UseVisualStyleBackColor = false;
            this.completatoBtn.Click += new System.EventHandler(this.completatoBtn_Click);
            // 
            // Ordine
            // 
            this.Controls.Add(this.pannello);
            this.Name = "Ordine";
            this.Size = new System.Drawing.Size(250, 540);
            this.pannello.ResumeLayout(false);
            this.pannello.PerformLayout();
            this.ResumeLayout(false);

        }

        private void completatoBtn_Click(object sender, EventArgs e) {
            HttpWebRequest req = (HttpWebRequest)WebRequest.Create(string.Format("http://localhost/sitoRistorante/api/cucina/setPreparato.php"));
            req.Method = "POST";
            req.ContentType = "applicatinon/json";
            string json = "{\"idOrdinazione\": " + orderId + "}";
            byte[] postBytes = Encoding.ASCII.GetBytes(json);
            req.ContentLength = postBytes.Length;

            Stream postStream = req.GetRequestStream();
            postStream.Write(postBytes, 0, json.Length);
            postStream.Flush();
            postStream.Close();

            Thread.Sleep(200);
            ic.aggiornaPietanze();
        }
    }
}

PGDMP         .                x            db_penduduk    12.4    12.4                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16430    db_penduduk    DATABASE     �   CREATE DATABASE db_penduduk WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE db_penduduk;
                postgres    false            �            1259    16446    tb_hubungan_id_hubungan_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_hubungan_id_hubungan_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;
 2   DROP SEQUENCE public.tb_hubungan_id_hubungan_seq;
       public          postgres    false            �            1259    16437    tb_hubungan    TABLE     �   CREATE TABLE public.tb_hubungan (
    id_hubungan integer DEFAULT nextval('public.tb_hubungan_id_hubungan_seq'::regclass) NOT NULL,
    kode_hubungan character(2),
    nama_hubungan character(30)
);
    DROP TABLE public.tb_hubungan;
       public         heap    postgres    false    205            �            1259    16444    tb_penduduk_id_penduduk_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_penduduk_id_penduduk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;
 2   DROP SEQUENCE public.tb_penduduk_id_penduduk_seq;
       public          postgres    false            �            1259    16431    tb_penduduk    TABLE     	  CREATE TABLE public.tb_penduduk (
    id_penduduk integer DEFAULT nextval('public.tb_penduduk_id_penduduk_seq'::regclass) NOT NULL,
    no_kk character(16),
    nik character(16),
    nama_penduduk character(50),
    id_hubungan smallint,
    no_rt character(3)
);
    DROP TABLE public.tb_penduduk;
       public         heap    postgres    false    204            
          0    16437    tb_hubungan 
   TABLE DATA           P   COPY public.tb_hubungan (id_hubungan, kode_hubungan, nama_hubungan) FROM stdin;
    public          postgres    false    203   y       	          0    16431    tb_penduduk 
   TABLE DATA           a   COPY public.tb_penduduk (id_penduduk, no_kk, nik, nama_penduduk, id_hubungan, no_rt) FROM stdin;
    public          postgres    false    202   '                  0    0    tb_hubungan_id_hubungan_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tb_hubungan_id_hubungan_seq', 1, false);
          public          postgres    false    205                       0    0    tb_penduduk_id_penduduk_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tb_penduduk_id_penduduk_seq', 1, false);
          public          postgres    false    204            �
           2606    16443    tb_hubungan tb_hubungan_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.tb_hubungan
    ADD CONSTRAINT tb_hubungan_pkey PRIMARY KEY (id_hubungan);
 F   ALTER TABLE ONLY public.tb_hubungan DROP CONSTRAINT tb_hubungan_pkey;
       public            postgres    false    203            �
           2606    16441    tb_penduduk tb_keluarga_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.tb_penduduk
    ADD CONSTRAINT tb_keluarga_pkey PRIMARY KEY (id_penduduk);
 F   ALTER TABLE ONLY public.tb_penduduk DROP CONSTRAINT tb_keluarga_pkey;
       public            postgres    false    202            
   �   x�}�M
�@���)rq�ߥ�TQХ�(C)m;oo�(�G�I��a4�.�pc� ��%H� c�Z(E��>&��d�+'�J�r䌽u⦠�cn��D�8xq-��w���P�[~R@45j�f�>t����2f�y�v��_�1�'�pO�]D���F�      	   �  x����n� E����Z� 6�q,75�؊�ZU������B���͋�y8\߹�ՠ�E �0 6���z�Q\�������>�GY,�TX�_�b���b��Ls%<��f�]�[��'��'�����ѧ��_ݵ��MG����c_h���:���m��'~п��.��2�'����.����=&��By��Ii��L��V���-�Z=�b�^���<-0�.�,��@�t/�G����Fv}�d�k	��ѧ�s�\���$�����7굧xv �鏣�	7/$No����Z�eK�8.֖N�#��/=�U�#��i�ҏ �Ф����_���Ǆ"��A��$���b[�U�%r���wnh���!��f�w-����U�ލ�&N=�+���c�3eUuJ$k7�Mn^gq'6�	5�C"SW9�(��φڵ��s4��ݫ������'�     